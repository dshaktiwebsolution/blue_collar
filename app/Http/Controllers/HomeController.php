<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uimage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Home/home');
    }
    public function signup()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        return view('auth/signup');
    }
    public function signup_company()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        $states = \DB::table('states')->where('country_id', 101)->get();

        return view('auth/employer/signup-company', compact('states'));
    }
    public function signup_person()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        $states = \DB::table('states')->where('country_id', 101)->get();
        return view('auth/employer/signup-person', compact('states'));
    }
    public function signup_jobs()
    {
        if (Auth::check()) {
            return redirect()->back();
        }

        return view('auth/jobs/signup-jobs');
    }
    public function company(Request $request)
    {

        $validator = array(
            'name'=>'required',
            'email'=>'required|email:rfc,dns|unique:users',
            'mobile_number'=>'required|numeric|digits:10|unique:users',
            'state'=>'required',
            'city'=>'required',
            'password'=>'required|same:confirm_password',
            'confirm_password'=>'required|same:password',
        );

        if($request->user_type == 0){
            $validator['company_name'] = 'required';
            $validator['web-site'] = 'required';
        }

         $request->validate($validator);

        $request->request->add(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect('employer-login')->withSuccess('You have successfully register.');

    }
    
    public function job(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'mobile_number'=>'required|numeric|digits:10|unique:users',
            'email'=>'required|email:rfc,dns|unique:users',
            'adharcard_number'=>'required|numeric|digits:12',
            'proofid_number'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'job_profile'=>'required',
            'skills'=>'required',
            'job_city'=>'required',
            'education'=>'required',
            'job_working'=>'required',
            'currently_working'=>'required',
            'job_time'=>'required',
            'salary'=>'required',
            'language'=>'required',
        ]);

        $request->request->add(['user_type' => 2]);
        $request->request->add(['skills' => implode(",", $request->skills)]);
        $request->request->add(['password' => Hash::make('987456123')]);
        $id  = User::create($request->all())->id;
        
        $image_name = "";
        $resume_name = "";

        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $data['u_id'] = $id;
            $path = public_path('/assets/photo/pic');
            $image_name = time().'.'.$image->extension();
            $image->move($path,$image_name);
        }

        if($request->hasfile('upload_resume'))
        {
            $upload_resume = $request->file('upload_resume');
            $val['u_id'] = $id;
            $path = public_path('/assets/photo/resume');
            $resume_name = time().'.'.$upload_resume->extension();
            $upload_resume->move($path,$resume_name);
        }

        if($image_name !="" || $resume_name != ""){
            $data['image'] = $image_name;
            $data['resume'] = $resume_name;
            Uimage::create($data);
        }
        
        return redirect('job-login')->withSuccess('You have successfully register.');
    }
    public function login_as_employer_or_jobseeker()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view("auth/login-as-employer-or-jobseeker");
    }
    public function employer_login()
    {
        if (Auth::check() && (isset(auth()->user()->user_type) && auth()->user()->user_type == '0') || (isset(auth()->user()->user_type) && auth()->user()->user_type == '1')) {
            return redirect()->back();
        }
        return view("auth/employer/employer-login");
    }
    public function job_login()
    {
        if (Auth::check() && (isset(auth()->user()->user_type) && auth()->user()->user_type == '2')) {
            return redirect()->back();
        }
        return view("auth/jobs/job-login");
    }

    public function empcheck(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 0]) || Auth::attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 1])) {
            return redirect("/employer-dashboard")->withSuccess('You have Successfully loggedin');
        }
        return redirect("/employer-login")->with('error', 'E-Mail Id and Password Invalid');

    }

    public function jobcheck(Request $request){
        
        $request->validate([
            'mobile_number'=>'required',
        ]);

        $user = User::whereMobileNumber($request->mobile_number)->whereUserType(2)->first();
       
        if (!empty($user)) {
            $data['verify_otp'] = '1234';
            User::whereId($user->id)->update($data);
            return view("auth/jobs/verify_job_otp", compact('user'));
        }
        return back()->with('error', 'Wrong mobile number.');
    }

    public function verify_job_otp(Request $request){

        $verify_otp = implode("", $request->verify_otp);
        $user = User::whereMobileNumber($request->mobile_number)->whereVerifyOtp($verify_otp)->first();

        if(!empty($user)){

            $credentials = array("email" => $user->email, "password" => "987456123");
            Auth::attempt($credentials);

            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
        
    }
   
    public function check_email_exists_in_users(Request $request){
        $id = '';
        if(Auth()->user()){
            $id = Auth()->user()->id;
        }

        if($id != ""){
            $rules = [
                'email'=> 'required|email|unique:users,email,'.$id.',id',
            ];
        } else {
            $rules = [
                'email'=> 'required|email|unique:users,email',
            ];
        }
        
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            $res = [
                'message' => $validator->errors()->all()[0],
                'status' => 0,
            ];
        
            return $res; 
        }

        $res = [
            'message' => 'success',
            'status' => 1,
        ];
    
        return $res;
    }
   
    public function check_mobile_number_exists_in_users(Request $request){

        $id = '';
        if(Auth()->user()){
            $id = Auth()->user()->id;
        }

        if($id != ""){
            $rules = [
                'mobile_number'=> 'required|numeric|digits_between:10,10|unique:users,mobile_number,'.$id.',id',
            ];
        } else {
            $rules = [
                'mobile_number'=> 'required|numeric|digits_between:10,10|unique:users,mobile_number',
            ];
        }
        
        $msg = [
            'mobile_number.digits_between'=>'The mobile number must be 10 digits.',
        ];
        $validator = \Validator::make($request->all(), $rules, $msg);
        if ($validator->fails())
        {
            $res = [
                'message' => $validator->errors()->all()[0],
                'status' => 0,
            ];
        
            return $res; 
        }

        $res = [
            'message' => 'success',
            'status' => 1,
        ];
    
        return $res;
    }

    public function get_city_by_state_id(Request $request){
        
        $cities = \DB::table('cities')->where('state_id', $request->state_id)->get();

        return response()->json($cities);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

}
