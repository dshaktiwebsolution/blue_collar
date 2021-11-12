<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Uimage;
use App\Models\UserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class Jobs extends Controller
{

    public function jobs_dashboard()
    {
        $skills = explode(",", auth()->user()->skills);

        $user = auth()->user();
                $all_job_ids    = array();

        if($user) $user_id = $user->id; else return redirect()->to('/login');
        $data['account']        = $user;

        $data['count']              =   Job::where('job_status','=','1')->count();
        $data['applied_job_count']  =   UserJob::where('user_id','=',$user_id)->where('action','=','applied_job')->count();
        $data['saved_job_count']    =   UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->count();
        $data['job_based_skills']   =   Job::orderBy('id', 'DESC')->when($skills, function ($query, $skills) {
            foreach($skills as $value){
                return $query->where('skills', 'like', '%'.$value.'%');
            }
            
        })->simplePaginate(5);


        $current_users_job      = Job::where('employer_id',"=",$user_id)->get();

        if(!empty($current_users_job)){

            foreach($current_users_job as $single_job){
                array_push($all_job_ids,$single_job->id);
            }
        }

        $data['save_job'] = UserJob::join('users','users.id','=','user_jobs.user_id')->join('jobs','jobs.id','=','user_jobs.job_id')->where('action','=','save_job')->whereIn('job_id',$all_job_ids)->orderBy('user_jobs.id', 'desc')->first();

        $data['applied_job'] = UserJob::join('users','users.id','=','user_jobs.user_id')->join('jobs','jobs.id','=','user_jobs.job_id')->where('action','=','applied_job')->whereIn('job_id',$all_job_ids)->orderBy('user_jobs.id', 'desc')->first();
      
        $main_arr = array();
         if(!empty($data['save_job'])){
                        array_push($main_arr, array(
                                    "html" => '<div class="act-img">
                                                <img src="public/assets/images/dashboard/activity/act3.png" alt="">
                                            </div>
                                            <div class="act-text">
                                                <h6>You are Resent Save this job <a href="'.url('/jobs-detail').'/'.$data['save_job']->job_slug.'">'.$data['save_job'] ->job_title.'</a> that Post By '.$data['save_job']->company_name.'.</h6>
                                                <p>'.time_elapsed_string($data['save_job'] ->created_time).'</p>
                                            </div>
                                            ',
                                        "time" => $data['save_job']->created_time   
                        ));
            }
            
            if(!empty($data['applied_job'])){
                    array_push($main_arr, array(
                        "html" => '<div class="act-img">
                                    <img src="public/assets/images/dashboard/activity/act1.png" alt="">
                                </div>
                                <div class="act-text">
                                    <h6>Your Latest Applied Job <a href="'.url('/jobs-detail').'/'.$data['applied_job']->job_slug.'">'.$data['applied_job']->job_title.'</a> that Post By '.$data['applied_job']->company_name.'.</h6>
                                    <p>'.time_elapsed_string($data['applied_job']->created_time).'</p>
                                </div>
                                </a>',
                        "time" => $data['applied_job']->created_time       
                        ));
            }
            

    array_multisort(array_map('strtotime',array_column($main_arr,'time')), SORT_DESC, $main_arr);
    $data['main_arr'] = $main_arr;

       return view('Jobs/jobs-dashboard',$data);
    }

    public function jobs(Request $request)
    {
        $request_data   =   $request->all();
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;
        $data['all_locations']  = Job::where('job_status','=','1')->get();


        // Job Sidebar Filter Action
        if(isset($request_data['action']) && $request_data['action'] == 'filter_jobs' && isset($request_data['pass_filter'])){

            $main_query = "SELECT * FROM jobs WHERE job_status=1";
            parse_str($request_data['pass_filter'], $parsed);
            $full_query = array();

            if(!empty($parsed)){
                foreach($parsed as $key => $single){

                    if($key == 'job_location'){
                        $inner_qry = '';

                        foreach ($single as $n => $item) {
                            $state_city = explode(',', $item);
                            if($n < count($single)-1){
                                $inner_qry .= " city='".trim($state_city[0])."' and state='".trim($state_city[1])."' or ";
                            } else {
                                $inner_qry .= " city='".trim($state_city[0])."' and state='".trim($state_city[1])."'";
                            }
                        }
                        $full_query[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif($key == 'job_type'){

                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " job_type='".$item."' or ";
                            } else {
                                $inner_qry .= " job_type='".$item."'";
                            }

                        }
                        $full_query[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif ($key == 'category_input'){

                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " job_role='".$item."' or ";
                            } else {
                                $inner_qry .= " job_role='".$item."'";
                            }

                        }
                        $full_query[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif ($key == 'salary_input'){
                        $min_sal = array("20000"=>"10000", "30000"=>"20000", "40000"=>"30000");
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " (min_salary >='".$min_sal[$item]."' and min_salary <'".$item."') or (max_salary >='".$min_sal[$item]."' and max_salary <'".$item."') or ";
                            } else {
                                $inner_qry .= " (min_salary >='".$min_sal[$item]."' and min_salary <'".$item."') or (max_salary >='".$min_sal[$item]."' and max_salary <'".$item."') ";
                            }

                        }
                        $full_query[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif ($key == 'job_experience'){
                        $min_age = array("12"=>"6","24"=>"12","36"=>"24","60"=>"36","66"=>"60");
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " ((min_experience <='".$min_age[$item]."' and  max_experience >='".$item."') or (max_experience >= '".$min_age[$item]."' and max_experience <='".$item."'))  or ";
                            } else {
                                $inner_qry .= " ((min_experience <='".$min_age[$item]."' and  max_experience >='".$item."') or (max_experience >= '".$min_age[$item]."' and max_experience <='".$item."')) ";
                            }

                        }

                        $full_query[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    }

                }
                $full_query[] = "(job_status=1)";
                if(!empty($full_query)){

                    $where = implode(" and ", $full_query);
                    $main_query = "SELECT * FROM jobs WHERE ".$where;
                }
            }
            $page = 0;
            if(isset($request_data['page']) && !empty($request_data['page'])){
                $page = $request_data['page']-1;
            }
            $start_limit = $page*8;
            $data['filter_job']       = DB::select($main_query." order by id DESC limit $start_limit, 8");
            $data['filter_job_count'] = ceil(count(DB::select($main_query))/8);
            $filter_url               = str_replace("=","%3D",$request_data['pass_filter']);
            $data['filter_url']       = str_replace('&','%26',$filter_url);
            $data['parse_in_url']     = $parsed;
            $data['all_locations']    = DB::select($main_query." order by id DESC");

        }

        // Saved Job Action
        if(isset($request_data['action']) && $request_data['action'] == 'saved_user_job'){
            $job_id = $request_data['job_id'];
            $status = $request_data['is_save_job'];

            $alredy_saved_jobs =  UserJob::where('user_id','=',$user_id)->where('job_id','=',$job_id)->where('action','=','save_job')->count();
            $ins=array(
                "user_id"       =>  $user_id,
                "job_id"        =>  $job_id,
                "created_time"  =>  date("Y-m-d h:i:s"),
                "action"        =>  "save_job"
            );
            if($status == 1){
                if(empty($alredy_saved_jobs)) DB::table("user_jobs")->insert($ins);
            } else {
                if(!empty($alredy_saved_jobs)){
                    UserJob::where('user_id','=',$user_id)->where('job_id','=',$job_id)->where('action','=','save_job')->delete();
                }
            }

        }

        $pass_saved_jobs    = array();
        $get_saved_jobs     = array();
        $get_applied_jobs   = array();

        if($user) $get_saved_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->get();

        if(isset($request_data['action']) && $request_data['action'] == 'applied_user_job'){

            $job_id = $request_data['job_id'];
            $already_applied_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','applied_job')->where('job_id','=',$job_id)->count();

            $ins=array(
                "user_id"       =>  $user_id,
                "job_id"        =>  $job_id,
                "created_time"  =>  date("Y-m-d h:i:s"),
                "action"        =>  "applied_job"
            );

            if(empty($already_applied_jobs)) DB::table("user_jobs")->insert($ins);

        }

        $pass_applied_jobs = array();
        if($user) $get_applied_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','applied_job')->get();

        foreach ($get_saved_jobs as $single){
            array_push($pass_saved_jobs,$single->job_id);
        }

        foreach ($get_applied_jobs as $single){
            array_push($pass_applied_jobs,$single->job_id);
        }


        $data['saved_by_current_user']      =   $pass_saved_jobs;
        $data['Job']                        =   Job::where('job_status','=','1')->orderBy('id', 'DESC')->paginate(8);
        $data['applied_by_current_user']    =   $pass_saved_jobs;
        
        $data['user_id']                    =   $user_id;
        $data['request_data']               =   $request_data;

        $data['full_count'] = Job::where('job_type','=','Permanent')->count();
        $data['part_count'] = Job::where('job_type','=','Contractual')->count();

        // print_r($data['part_count']);

         return view('Jobs/jobs',$data);

    }

    public function jobs_applied(Request $request)
    {
        $request_data = $request->all();
        $user = auth()->user();
        $pass_saved_jobs =  array();

        if($user) $user_id = $user->id; else return redirect()->to('/login');

        $data=array();
        $data['recent_job'] = Job::where('job_status','=','1')->orderBy('id','DESC')->paginate(2);

        if(!empty($user_id)){
            $data['applie_job']  = UserJob::orderBy('user_jobs.id','DESC')->join('jobs','jobs.id', '=', 'user_jobs.job_id')->where('action','=','applied_job')->where('user_id','=',$user_id)->paginate(8);
            $get_saved_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->get();
            foreach ($get_saved_jobs as $single){
                array_push($pass_saved_jobs,$single->job_id);
            }
            $data['saved_by_current_user']      =   $pass_saved_jobs;
        }


        return view('Jobs/jobs-applied',$data);
    }

    public function jobs_saved_jobs(Request $request)
    {
        $request_data   =   $request->all();
        $user           =   auth()->user();
        if($user) $user_id = $user->id; else return redirect()->to('/login');
        $data       = array();
        $data['recent_job'] = Job::where('job_status','=','1')->orderBy('id','DESC')->paginate(2);
        $pass_saved_jobs =  array();

        if(!empty($user_id)){
            $data['save_job']  = UserJob::orderBy('user_jobs.id','DESC')->join('jobs','jobs.id', '=', 'user_jobs.job_id')->where('action','=','save_job')->where('user_id','=',$user_id)->paginate(8);
            $get_saved_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->get();
            foreach ($get_saved_jobs as $single){
                array_push($pass_saved_jobs,$single->job_id);
            }
            $data['saved_by_current_user']      =   $pass_saved_jobs;
        }


        return view('Jobs/jobs-saved-jobs', $data);
    }

    public function jobs_detail($job_slug)
    {
        $user       = auth()->user();
        $user_id    = '';
        $pass_saved_jobs =  array();

        $data['applied_job']="";
        if($user) $user_id = $user->id;
    
        $get_job = Job::where('job_slug','=',$job_slug)->first();

        if(!empty($user_id) && !empty($get_job) && isset($get_job->id)){

            $data['applied_job']= UserJob::join('jobs','jobs.id', '=', 'user_jobs.job_id')->where('user_id','=',$user_id)->where('job_id','=', $get_job->id)->where('action','=','applied_job')->count();
            
            $get_saved_jobs = UserJob::where('user_id','=',$user_id)->where('job_id','=', $get_job->id)->where('action','=','save_job')->get();

            foreach ($get_saved_jobs as $single){
                array_push($pass_saved_jobs,$single->job_id);
            }
            $data['saved_by_current_user']  =   $pass_saved_jobs;
        }
    
        $data['tbl_job'] = Job::where(\DB::raw("LOWER(job_slug)"),$job_slug)->first();

        if(empty($data['tbl_job'])) return view(404);
        $data['user_id']    =   $user_id;

        return view('Jobs/jobs-detail',$data);
    }

    public function jobsviewprofile()
    {
        return view('Jobs/jobsviewprofile');
    }

    public function jobseditprofile()
    {
        return view('Jobs/jobseditprofile');
    }

    public function jobsupdateprofile(Request $request){
       
        $user = array(
            "mobile_number" => $request->mobile_number,
            "email" => $request->email,
            "job_profile" => $request->job_profile,
            "job_city" => $request->job_city,
            "education" => $request->education,
            "curlast_company" => $request->curlast_company,
            "job_time" => $request->job_time,
            "salary" => $request->salary,
            "language" => $request->language,
            "age" => $request->age,
            "gender" => $request->gender,
            "skills" => implode(",", $request->skills),
        );

        User::whereId(auth()->user()->id)->update($user);

        $image_name = "";

        if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $data['u_id'] = auth()->user()->id;
            $path = public_path('/assets/photo/pic');
            $image_name = time().'.'.$image->extension();
            $image->move($path, $image_name);

            $data['image'] = $image_name;
            $uimages = Uimage::whereUId(auth()->user()->id)->first();
            if(!empty($uimages) && $uimages->image != ""){
                if(file_exists(public_path('assets/photo/pic/'.$uimages->image))){
                    unlink(public_path('assets/photo/pic/'.$uimages->image));
                }

                Uimage::whereUId(auth()->user()->id)->update($data);
            } else {
                Uimage::create($data);
            }
        }
        
        return redirect('/jobsviewprofile')->withSuccess('Your profile successfully updated.');

    }

    public function search(Request $request)
    {
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        $data           =   $request->input();
        $request_data   =   $request->all();
        $where = array();
        $pass_saved_jobs    = array();
        $get_saved_jobs     = array();
        $parsed             = array();

        if(isset($request_data['action']) && $request_data['action'] == 'saved_user_job'){
            $job_id = $request_data['job_id'];
            $status = $request_data['is_save_job'];

            $alredy_saved_jobs =  UserJob::where('user_id','=',$user_id)->where('job_id','=',$job_id)->where('action','=','save_job')->count();
            $ins=array(
                "user_id"       =>  $user_id,
                "job_id"        =>  $job_id,
                "created_time"  =>  date("Y-m-d h:i:s"),
                "action"        =>  "save_job"
            );
            if($status == 1){
                if(empty($alredy_saved_jobs)) DB::table("user_jobs")->insert($ins);
            } else {
                if(!empty($alredy_saved_jobs)){
                    UserJob::where('user_id','=',$user_id)->where('job_id','=',$job_id)->where('action','=','save_job')->delete();
                }
            }
        }
        if($user) $get_saved_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->get();
        foreach ($get_saved_jobs as $single){
            array_push($pass_saved_jobs,$single->job_id);
        }
        $data['saved_by_current_user']      =   $pass_saved_jobs;

        $data['all_locations'] =  Job::where('job_status','=',1)->get();
        if(!empty($data['search_job'])){
            $where[] = "job_title LIKE '%".$data['search_job']."%' ";
        }
        if(!empty($data['search_location'])){
            $where[] = "city LIKE '%".$data['search_location']."%' or state LIKE '%".$data['search_location']."%'  ";
        }
        if(!empty($data['search_role'])){
            $where[] = "job_role LIKE '%".$data['search_role']."' ";
        }
        if(isset($request_data['pass_filter']))  parse_str($request_data['pass_filter'], $parsed);
        if(!empty($parsed)){
                foreach($parsed as $key => $single){

                    if($key == 'job_location'){
                        $inner_qry = '';

                        foreach ($single as $n => $item) {
                            $state_city = explode(',', $item);
                            if($n < count($single)-1){
                                $inner_qry .= " city='".trim($state_city[0])."' and state='".trim($state_city[1])."' or ";
                            } else {
                                $inner_qry .= " city='".trim($state_city[0])."' and state='".trim($state_city[1])."'";
                            }
                        }
                        $where[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif($key == 'job_type'){

                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " job_type='".$item."' or ";
                            } else {
                                $inner_qry .= " job_type='".$item."'";
                            }

                        }
                        $where[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif ($key == 'category_input'){

                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " job_role='".$item."' or ";
                            } else {
                                $inner_qry .= " job_role='".$item."'";
                            }

                        }
                        $where[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif ($key == 'salary_input'){
                        $min_sal = array("20000"=>"10000", "30000"=>"20000", "40000"=>"30000");
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " (min_salary >='".$min_sal[$item]."' and min_salary <'".$item."') or (max_salary >='".$min_sal[$item]."' and max_salary <'".$item."') or ";
                            } else {
                                $inner_qry .= " (min_salary >='".$min_sal[$item]."' and min_salary <'".$item."') or (max_salary >='".$min_sal[$item]."' and max_salary <'".$item."') ";
                            }

                        }
                        $where[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif ($key == 'job_experience'){
                        $min_age = array("12"=>"6","24"=>"12","36"=>"24","60"=>"36","66"=>"60");
                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " ((min_experience <='".$min_age[$item]."' and  max_experience >='".$item."') or (max_experience >= '".$min_age[$item]."' and max_experience <='".$item."'))  or ";
                            } else {
                                $inner_qry .= " ((min_experience <='".$min_age[$item]."' and  max_experience >='".$item."') or (max_experience >= '".$min_age[$item]."' and max_experience <='".$item."')) ";
                            }

                        }

                        $where[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    }

                }

            }
        $where[] = "(job_status=1)";
        if(!empty($where)){
            $where_q = implode(" and ", $where);
            $main_query = "SELECT * FROM jobs WHERE ".$where_q;
        } else {
            $main_query = "SELECT * FROM jobs where job_status=1";
        }
        
        

        $page = 0;
        if(isset($request_data['page']) && !empty($request_data['page'])){
            $page = $request_data['page']-1;
        }
        $start_limit = $page*8;
        $data['search_job'] = DB::select($main_query." order by id DESC limit $start_limit, 8");
        $data['search_job_count'] = ceil(count(DB::select($main_query))/8);
        $data['request_data']     =   $request_data;
        $data['all_locations']  = DB::select($main_query);
        $data['user_id']       =   $user_id;

        return view('Jobs/search',$data);

    }


}
