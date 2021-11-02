<?php

namespace App\Http\Controllers;

use App\Models\Job;
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
    public function employereditpost($id)
    {
        $data['tbl_job']    =   Job::where('id',$id)->first();
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

        $time_array = array();
        $request->validate([
            'company_name'=>'required',
            'job_title'=>'required',
            'job_role'=>'required',
            'min_experience'=>'required',
            'max_experience'=>'required',
            'qualification'=>'required',
            'min_age'=>'required|numeric',
            'max_age'=>'required|numeric',
            'min_salary'=>'required|numeric',
            'max_salary'=>'required|numeric',
            'con_name'=>'required|alpha',
            'con_number'=>'required|numeric|digits:10',
            'con_email'=>'required|email:rfc,dns',

        ]);

        $data=$request->input();
        //dd($data);

        $time_array['monday']['close']  = isset($data['rmonday']) ? $data['rmonday'] : '';
        $time_array['monday']['start']  = $data['mstart'];
        $time_array['monday']['end']    = $data['mend'];

        $time_array['tuesday']['close'] = isset($data['rtuesday']) ? $data['rtuesday'] : '';
        $time_array['tuesday']['start'] = $data['tstart'];
        $time_array['tuesday']['end']   = $data['tend'];

        $time_array['wednesday']['close'] = isset($data['rwednesday']) ? $data['rwednesday'] : '';
        $time_array['wednesday']['start'] = $data['wstart'];
        $time_array['wednesday']['end']   = $data['wend'];

        $time_array['thursday']['close'] = isset($data['rthursday']) ? $data['rthursday'] : '';
        $time_array['thursday']['start'] = $data['thstart'];
        $time_array['thursday']['end']  = $data['thend'];

        $time_array['friday']['close'] = isset($data['rfriday']) ? $data['rfriday'] : '';
        $time_array['friday']['start'] = $data['fstart'];
        $time_array['friday']['end']   = $data['fend'];

        $time_array['saturday']['close'] = isset($data['rsaturday']) ? $data['rsaturday'] : '';
        $time_array['saturday']['start'] = $data['sastart'];
        $time_array['saturday']['end']   = $data['saend'];

        $time_array['sunday']['close']  = isset($data['rsunday']) ? $data['rsunday'] : '';
        $time_array['sunday']['start']  = $data['sstart'];
        $time_array['sunday']['end']    = $data['send'];

//        $time=array(
//            "job_time"=>$data['sstart'&&'send'],
//        );
        $ins=array(
            "company_name"=>$data['company_name'],
            "job_title"=>$data['job_title'],
            "job_role"=>$data['job_role'],
            "job_type"=>$data['jtno'],
            "job_day"=>$data['hdm'],
            "job_duration"=>$data['job_duration'],
            "state"=>$data['state'],
            "city"=>$data['city'],
            "min_experience"=>$data['min_experience'],
            "max_experience"=>$data['max_experience'],
            "qualification"=>$data['qualification'],
            "skills"=>serialize($data['skills']),
            "gender"=>$data['gnder'],
            "min_age"=>$data['min_age'],
            "max_age"=>$data['max_age'],
            "language"=>serialize($data['language']),
            "min_salary"=>$data['min_salary'],
            "max_salary"=>$data['max_salary'],
            "work_home"=>$data['wfha'],
            "benefits"=>$data['benefits'],
            "job_desc"=>$data['job_desc'],
            "candidates_contact"=>$data['cnct'],
            "con_name"=>$data['con_name'],
            "con_number"=>$data['con_number'],
            "con_email"=>$data['con_email'],
            "job_time"=>serialize($time_array),
            "employer_id"=>$user_id

        );
        Job::create($ins);
        return redirect('inactive-jobs');
    }
    public function employer_job_listing($id)
    {
        $user       = auth()->user();
        $user_id    = '';
        $data['tbl_job']    =   Job::where('id',$id)->first();
//        $data['user_id']    =   $user_id;
        return view('Employer/employer-job-listing',$data);
    }
    public function inactive_jobs()
    {
        $data['inactive_job']= Job::orderBy('id','DESC')->where('job_status','=','0')->paginate(8);
        $data['job_status'] = Job::where('job_status','=','0')->get();
        return view('Employer/inactive-jobs',$data);

    }
    public function employer_dashboard()
    {
//        $id=0;
        $data['the_job']= Job::orderBy('id','DESC')->paginate(5);
//        $count = DB::table('jobs')->where('id',$id)->count();
//        $count = Job::find('id')->select('id')->get()->count();
        $data['count']          = Job::all()->count();
        $data['active_count']   = Job::where('job_status','=',1)->count();
        $data['inactive_count'] = Job::where('job_status','=',0)->count();
//        print_r($count);

        return view('Employer/employer-dashboard',$data);
    }
    public function employereditprofile()
    {
        return view('Employer/employereditprofile');
    }
    public function employerviewprofile()
    {
        return view('Employer/employerviewprofile');
    }
    public function active_jobs()
    {
        $data['active_job']= Job::orderBy('id','DESC')->where('job_status','=','1')->paginate(8);
        $data['job_status'] = Job::where('job_status','=','1')->get();
        return view('Employer/active-jobs',$data);
    }
    public function candidate_job()
    {
        return view('Employer/candidate-job');
    }


}
