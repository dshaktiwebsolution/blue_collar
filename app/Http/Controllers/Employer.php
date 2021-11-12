<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\UserJob;
use App\Models\Uimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Employer extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function employereditpost($job_slug)
    {
        $data['tbl_job'] = Job::where(\DB::raw("LOWER(job_slug)"),$job_slug)->first();
        // $data['tbl_job']    =   Job::where('id',$id)->first();
        return view('Employer/employer-edit-post',$data);
    }
    public function employer_post_job()
    {
        return view('Employer/employer-post-job');
    }
    public function frompost(Request $request)
    {
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $request->validate([
            'job_title'=>'required',
            'job_role'=>'required',
            'job_type'=>'required|in:Permanent,Contractual',
            'min_salary'=>'required|numeric',
            'max_salary'=>'required|numeric',
            'company_opening'=>'required',
            'company_working_days'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'education'=>'required',
            'experience'=>'required',
            'gender'=> 'required|in:Male,Female,Both',
            'skills'=>'required',
            'qualification'=>'required',
            'min_age'=>'required|numeric',
            'max_age'=>'required|numeric',
            'language'=>'required',
            'benefits'=>'required',
            'contact_type'=>'required',
            'business'=>'required',
            'business_name'=>'required',
            'state'=>'required',
            'city'=>'required',
            'company_address'=>'required',
            'name'=>'required',
            'number'=>'required|numeric|digits:10',
            'email'=>'required|email:rfc,dns',
        ]);

        $data=$request->input();
        // print_r($data);
        // die();
        $new_slug = !empty($data['job_title']) ? get_slug($data['job_title']) : '';
                 
        $ins=array(

            "job_title"=>$data['job_title'],
            "job_role"=>$data['job_role'],
            "job_slug"=>$new_slug,
            "work_home"=>$data['wfha'],
            "job_type"=>$data['job_type'],
            "job_day"=>$data['hdm'],
            "job_duration"=>$data['job_duration'],
            "min_salary"=>$data['min_salary'],
            "max_salary"=>$data['max_salary'],
            "company_opening"=>$data['company_opening'],
            "company_job_days"=>$data['company_working_days'],
            "job_time_start"=>$data['start_time'],
            "job_time_end"=>$data['end_time'],
            "company_education"=>$data['education'],
            "experience_custom"=>$data['experience'],
            "min_experience"=>$data['min_experience'],
            "max_experience"=>$data['max_experience'],
            "gender"=>$data['gender'],
            "skills"=>serialize($data['skills']),
            "qualification"=>$data['qualification'],
            "min_age"=>$data['min_age'],
            "max_age"=>$data['max_age'],
            "language"=>serialize($data['language']),
            "benefits"=>$data['benefits'],
            "job_desc"=>$data['job_desc'],
            "candidates_contact"=>$data['contact_type'],
            "business_type"=>$data['business'],
            "company_name"=>$data['business_name'],
            "state"=>$data['state'],
            "city"=>$data['city'],
            "company_address"=>$data['company_address'],
            "con_name"=>$data['name'],
            "con_number"=>$data['number'],
            "con_email"=>$data['email'],
            "job_status"=>0,
            "employer_id"=>$user_id
        );
        // print_r($ins);


        Job::create($ins);
        return redirect('inactive-jobs');
    }
    public function employer_job_listing($job_slug)
    {
        $user       = auth()->user();
        $user_id    = '';
        if($user) $user_id = $user->id;

        $data['tbl_job'] = Job::where(\DB::raw("LOWER(job_slug)"),$job_slug)->first();

        if(empty($data['tbl_job'])) return view(404);

        
        $data['user_id']    =   $user_id;

        return view('Employer/employer-job-listing',$data);
    }
    public function inactive_jobs()
    {

        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $data['company']  =  User::where('id','=',$user_id)->get();
        $data['inactive_job']= Job::orderBy('id','DESC')->where('employer_id',"=",$user_id)->where('job_status','=','0')->paginate(8);
        $data['job_status'] = Job::where('job_status','=','0')->get();
        return view('Employer/inactive-jobs',$data);

    }
    public function employer_dashboard()
    {
        $user           =   auth()->user();
        $user_id        =   '';
        $all_job_ids    = array();

        if($user) $user_id = $user->id;

        $data['account']        = $user;
        $data['the_job']        = Job::orderBy('id','DESC')->paginate(5);
        $data['count']          = Job::where('employer_id',"=",$user_id)->count();
        $data['active_count']   = Job::where('job_status','=',1)->where('employer_id',"=",$user_id)->count();

        $data['inactive_count'] = Job::where('job_status','=',0)->where('employer_id',"=",$user_id)->count();
        $data['activity']       = Job::orderBy('id','DESC')->where('employer_id',"=",$user_id)->first();
        $current_users_job      = Job::where('employer_id',"=",$user_id)->get();

        if(!empty($current_users_job)){

            foreach($current_users_job as $single_job){
                array_push($all_job_ids,$single_job->id);
            }
        }
    
        $data['save_job']       = UserJob::join('users','users.id','=','user_jobs.user_id')->join('jobs','jobs.id','=','user_jobs.job_id')->where('action','=','save_job')->whereIn('job_id',$all_job_ids)->orderBy('user_jobs.id', 'desc')->first();
        $data['applied_job']    = UserJob::join('users','users.id','=','user_jobs.user_id')->join('jobs','jobs.id','=','user_jobs.job_id')->where('action','=','applied_job')->whereIn('job_id',$all_job_ids)->orderBy('user_jobs.id', 'desc')->first();
            $main_arr = array();

            if(!empty($data['activity'])){
                $t = $data['activity']->creation_date;
                array_push($main_arr, array( "html" => '
                                        
                                        <div class="act-img">
                                            <img src="public/assets/images/dashboard/activity/act1.png" alt="">
                                        </div>
                                        <div class="act-text">
                                            
                                            <h6>Your Latest Job Post <a href="'.url('/employer-job-listing').'/'.$data['activity']->job_slug.'">'.$data['activity']->job_title.'</a></h6>
                                            <p>'.time_elapsed_string($data['activity']->creation_date).'</p>
                                            
                                        </div>',
                                        "time" => $t
                        ));
            }
            
            if(!empty($data['save_job'])){
                        array_push($main_arr, array(
                                    "html" => '
                                            <div class="act-img">
                                                <img src="public/assets/images/dashboard/activity/act3.png" alt="">
                                            </div>
                                            <div class="act-text">
                                                <h6>Your Latest Job <a href="'.url('/employer-job-listing').'/'.$data['save_job']->job_slug.'">'.$data['save_job'] ->job_title.'</a> is Save By User '.$data['save_job']->name.'.</h6>
                                                <p>'.time_elapsed_string($data['save_job'] ->created_time).'</p>
                                            </div>',
                                        "time" => $data['save_job']->created_time   
                        ));
            }
            
            if(!empty($data['applied_job'])){
                    array_push($main_arr, array(
                        "html" => '
                                <div class="act-img">
                                    <img src="public/assets/images/dashboard/activity/act1.png" alt="">
                                </div>
                                <div class="act-text">
                                    <h6>Your Resent Job <a href="'.url('/employer-job-listing').'/'.$data['applied_job']->job_slug.'">'.$data['applied_job']->job_title.'</a> Applied By User '.$data['applied_job']->name.'.</h6>
                                    <p>'.time_elapsed_string($data['applied_job']->created_time).'</p>
                                </div>',
                        "time" => $data['applied_job']->created_time       
                        ));
            }
            

            array_multisort(array_map('strtotime',array_column($main_arr,'time')), SORT_DESC, $main_arr);
            $data['main_arr'] = $main_arr;
        return view('Employer/employer-dashboard',$data);
    }
    public function employereditprofile()
    {
        $states = \DB::table('states')->where('country_id', 101)->get();
        $cities = \DB::table('cities')->where('id', auth()->user()->city)->get();
        return view('Employer/employereditprofile', compact('states', 'cities'));
    }
    public function employerviewprofile()
    {
        // echo "<pre>";
        // print_r(auth()->user()->uimage);
        // exit;
        return view('Employer/employerviewprofile');
    }

    public function employerupdateprofile(Request $request){

        $data = array(
            "name" => $request->name,
            "company_name" => $request->company_name,
            "about_company" => $request->about_company,
            "mobile_number" => $request->mobile_number,
            "email" => $request->email,
            "state" => $request->state_id,
            "city" => $request->city_id,
        );
        User::whereId(auth()->user()->id)->update($data);

        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $uimages_data['u_id'] = auth()->user()->id;
            $path = public_path('/assets/photo/pic');
            $image_name = time().'.'.$image->extension();
            $image->move($path,$image_name);

            $uimages_data['image'] = $image_name;

            $uimages = Uimage::whereUId(auth()->user()->id)->first();

            if(!empty($uimages) && $uimages->image != ""){
                if(file_exists(public_path('assets/photo/pic/'.$uimages->image))){
                    unlink(public_path('assets/photo/pic/'.$uimages->image));
                }
                Uimage::whereUId(auth()->user()->id)->update($uimages_data);
            } else {
                Uimage::create($uimages_data);
            }

        }

        return redirect('employerviewprofile')->withSuccess('Your profile successfully updated.');
    }

    public function active_jobs()
    {
        
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $data['company']  =  User::where('id','=',$user_id)->get();
        $data['active_job']= Job::orderBy('id','DESC')->where('employer_id',"=",$user_id)->where('job_status','=','1')->paginate(8);
        $data['job_status'] = Job::where('job_status','=','1')->get();
        return view('Employer/active-jobs',$data);
    }
    public function candidate_job()
    {
        return view('Employer/candidate-job');
    }
    public function candidate_detail()
    {
        return view('Employer/candidate-detail');
    }

    public function update_job_post(Request $request,$id)
    {
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;
        
        $request->validate([
            'job_title'=>'required',
            'job_role'=>'required',
            'job_type'=>'required|in:Permanent,Contractual',
            'min_salary'=>'required|numeric',
            'max_salary'=>'required|numeric',
            'company_opening'=>'required',
            'company_working_days'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'education'=>'required',
            'experience'=>'required',
            'gender'=> 'required|in:Male,Female,Both',
            'skills'=>'required',
            'qualification'=>'required',
            'min_age'=>'required|numeric',
            'max_age'=>'required|numeric',
            'language'=>'required',
            'benefits'=>'required',
            'contact_type'=>'required',
            'business'=>'required',
            'business_name'=>'required',
            'state'=>'required',
            'city'=>'required',
            'company_address'=>'required',
            'name'=>'required',
            'number'=>'required|numeric|digits:10',
            'email'=>'required|email:rfc,dns',

        ]);
        $data=$request->input();

        $update=array(
            
            "job_title"=>$data['job_title'],
            "job_role"=>$data['job_role'],
            "work_home"=>$data['wfha'],
            "job_type"=>$data['job_type'],
            "job_day"=>$data['hdm'],
            "job_duration"=>$data['job_duration'],
            "min_salary"=>$data['min_salary'],
            "max_salary"=>$data['max_salary'],
            "company_opening"=>$data['company_opening'],
            "company_job_days"=>$data['company_working_days'],
            "job_time_start"=>$data['start_time'],
            "job_time_end"=>$data['end_time'],
            "company_education"=>$data['education'],
            "experience_custom"=>$data['experience'],
            "min_experience"=>$data['min_experience'],
            "max_experience"=>$data['max_experience'],
            "gender"=>$data['gender'],
            "skills"=>serialize($data['skills']),
            "qualification"=>$data['qualification'],
            "min_age"=>$data['min_age'],
            "max_age"=>$data['max_age'],
            "language"=>serialize($data['language']),
            "benefits"=>$data['benefits'],
            "job_desc"=>$data['job_desc'],
            "candidates_contact"=>$data['contact_type'],
            "business_type"=>$data['business'],
            "company_name"=>$data['business_name'],
            "state"=>$data['state'],
            "city"=>$data['city'],
            "company_address"=>$data['company_address'],
            "con_name"=>$data['name'],
            "con_number"=>$data['number'],
            "con_email"=>$data['email'],
            "employer_id"=>$user_id

        );
        // print_r($update);
        Job::where('id',$id)->update($update); 
        return redirect('/inactive-jobs')->with('message','Job Update Successfully');
    }
    public function employer_delete_post($id)
    {
        $data= Job::find($id);
        $data->delete();
        //return back()->with('message','Job Delete Successfully');
    }
    public function employer_repost_job($id)
    {
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $repost = Job::where('id',$id)->first();
        $new_slug = !empty($repost->job_title) ? get_slug($repost->job_title) : '';

        $ins=array(
            "job_title"=>$repost->job_title,
            "job_role"=>$repost->job_role,
            "job_slug"=>$new_slug,
            "work_home"=>$repost->work_home,
            "job_type"=>$repost->job_type,
            "job_day"=>$repost->job_day,
            "job_duration"=>$repost->job_duration,
            "min_salary"=>$repost->min_salary,
            "max_salary"=>$repost->max_salary,
            "company_opening"=>$repost->company_opening,
            "company_job_days"=>$repost->company_job_days,
            "job_time_start"=>$repost->job_time_start,
            "job_time_end"=>$repost->job_time_end,
            "company_education"=>$repost->company_education,
            "experience_custom"=>$repost->experience_custom,
            "min_experience"=>$repost->min_experience,
            "max_experience"=>$repost->max_experience,
            "gender"=>$repost->gender,
            "skills"=>$repost->skills,
            "qualification"=>$repost->qualification,
            "min_age"=>$repost->min_age,
            "max_age"=>$repost->max_age,
            "language"=>$repost->language,
            "benefits"=>$repost->benefits,
            "job_desc"=>$repost->job_desc,
            "candidates_contact"=>$repost->candidates_contact,
            "business_type"=>$repost->business_type,
            "company_name"=>$repost->company_name,
            "state"=>$repost->state,
            "city"=>$repost->city,
            "company_address"=>$repost->company_address,
            "con_name"=>$repost->con_name,
            "con_number"=>$repost->con_number,
            "con_email"=>$repost->con_email,
            "job_status"=>$repost->job_status,
            "employer_id"=>$repost->employer_id
        );
        Job::create($ins);
       return redirect('/inactive-jobs')->with('message','Job Repost Successfully');
    }


}
