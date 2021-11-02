<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Uimage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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

        return view('auth/employer/signup-company');
    }
    public function signup_person()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('auth/employer/signup-person');
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
            $validator['about_company'] = 'required';
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
        if (Auth::check()) {
            return redirect()->back();
        }
        return view("auth/employer/employer-login");
    }
    public function job_login()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view("auth/jobs/job-login");
    }

    public function empcheck(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("/employer-dashboard")->withSuccess('You have Successfully loggedin');
        }
        return redirect("/employer-login")->with('error', 'E-Mail Id and Password Invalid');

    }

    public function jobcheck(Request $request){
        
        $user = User::whereMobileNumber($request->mobile_number)->first();
       
        if (!empty($user)) {
            $data['verify_otp'] = '1234';
            User::whereId($user->id)->update($data);
            return view("auth/jobs/verify_job_otp", compact('user'));
        }
        return redirect("/employer-login")->with('error', 'E-Mail Id and Password Invalid');
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
   
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }

}
