<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\UserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class Jobseeker extends Controller
{

    public function jobseeker_dashboard()
    {
        $user = auth()->user();
        if($user) $user_id = $user->id; else return redirect()->to('/login');

        $data['count']              =   Job::all()->count();
        $data['applied_job_count']  =   UserJob::where('user_id','=',$user_id)->where('action','=','applied_job')->count();
        $data['saved_job_count']    =   UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->count();
        $data['job_based_skills']   =   Job::orderBy('id', 'DESC')->paginate(5);

        return view('Jobseeker/jobseeker-dashboard',$data);
    }

    public function jobseeker(Request $request)
    {
        $request_data   =   $request->all();
        $user           =   auth()->user();
        $user_id        =   '';
        if($user) $user_id = $user->id;

        // Job Sidebar Filter Action
        if(isset($request_data['action']) && $request_data['action'] == 'filter_jobs' && isset($request_data['pass_filter'])){

            $main_query = "SELECT * FROM jobs";
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

                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " max_salary='".$item."' or ";
                            } else {
                                $inner_qry .= " max_salary='".$item."'";
                            }

                        }
                        $full_query[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    } elseif ($key == 'job_experience'){

                        $inner_qry = '';
                        foreach ($single as $n => $item) {
                            if($n < count($single)-1){
                                $inner_qry .= " max_experience='".$item."' or ";
                            } else {
                                $inner_qry .= " max_experience='".$item."'";
                            }

                        }
                        $full_query[] = !empty($inner_qry) ? "(".$inner_qry.")" : "";

                    }

                }
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
            $data['filter_job'] = DB::select($main_query." order by id DESC limit $start_limit, 8");
            $data['filter_job_count'] = ceil(count(DB::select($main_query))/8);
            $data['filter_url'] = $request_data['pass_filter'];

        }

        // Saved Job Action
        if(isset($request_data['action']) && $request_data['action'] == 'saved_user_job'){
            $job_id = $request_data['job_id'];
            $status = $request_data['is_save_job'];

            $alredy_saved_jobs =  UserJob::where('user_id','=',$user_id)->where('job_id','=',$job_id)->where('action','=','save_job')->count();
            $ins=array(
                "user_id"=>$user_id,
                "job_id"=>$job_id,
                "action"=>"save_job"
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
                "user_id"=>$user_id,
                "job_id"=>$job_id,
                "action"=>"applied_job"
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
        $data['Job']                        =   Job::orderBy('id', 'DESC')->paginate(8);
        $data['applied_by_current_user']    =   $pass_saved_jobs;
        $data['all_locations']              =   Job::all();
        $data['user_id']                    =   $user_id;
        $data['request_data']               =   $request_data;

        return view('Jobseeker/jobseeker',$data);

    }

    public function jobseeker_applied(Request $request)
    {
        $request_data = $request->all();
        $user = auth()->user();
        $pass_saved_jobs =  array();

        if($user) $user_id = $user->id; else return redirect()->to('/login');

        $data=array();
        $data['recent_job'] = Job::orderBy('id','DESC')->paginate(2);

        if(!empty($user_id)){
            $data['applie_job']  = UserJob::orderBy('user_jobs.id','DESC')->join('jobs','jobs.id', '=', 'user_jobs.job_id')->where('action','=','applied_job')->where('user_id','=',$user_id)->paginate(8);
            $get_saved_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->get();
            foreach ($get_saved_jobs as $single){
                array_push($pass_saved_jobs,$single->job_id);
            }
            $data['saved_by_current_user']      =   $pass_saved_jobs;
        }


        return view('Jobseeker/jobseeker-applied',$data);
    }

    public function jobseeker_saved_jobs(Request $request)
    {
        $request_data   =   $request->all();
        $user           =   auth()->user();
        if($user) $user_id = $user->id; else return redirect()->to('/login');
        $data       = array();
        $data['recent_job'] = Job::orderBy('id','DESC')->paginate(2);
        $pass_saved_jobs =  array();

        if(!empty($user_id)){
            $data['save_job']  = UserJob::orderBy('user_jobs.id','DESC')->join('jobs','jobs.id', '=', 'user_jobs.job_id')->where('action','=','save_job')->where('user_id','=',$user_id)->paginate(8);
            $get_saved_jobs = UserJob::where('user_id','=',$user_id)->where('action','=','save_job')->get();
            foreach ($get_saved_jobs as $single){
                array_push($pass_saved_jobs,$single->job_id);
            }
            $data['saved_by_current_user']      =   $pass_saved_jobs;
        }


        return view('Jobseeker/jobseeker-saved-jobs', $data);
    }

    public function jobseeker_detail($id)
    {
        $user       = auth()->user();
        $user_id    = '';
        if($user) $user_id = $user->id;
        $data['applied_job']="";
        if($user) $data['applied_job']    =   UserJob::where('user_id','=',$user_id)->where('job_id','=',$id)->where('action','=','applied_job')->count();

        $data['tbl_job']    =   Job::where('id',$id)->first();
        $data['user_id']    =   $user_id;

        return view('Jobseeker/jobseeker-detail',$data);
    }

    public function jobseekerviewprofile()
    {
        return view('Jobseeker/jobseekerviewprofile');
    }

    public function jobseekereditprofile()
    {
        return view('Jobseeker/jobseekereditprofile');
    }

    public function search(Request $request)
    {
        $data           =   $request->input();
        $request_data   =   $request->all();
        $where = array();

        $data['all_locations'] =  Job::all();
        if(!empty($data['search_job'])){
            $where[] = "job_title LIKE '%".$data['search_job']."%' ";
        }
        if(!empty($data['search_location'])){
            $where[] = "city LIKE '%".$data['search_location']."%' or state LIKE '%".$data['search_location']."%'  ";
        }
        if(!empty($data['search_role'])){
            $where[] = "job_role LIKE '%".$data['search_role']."' ";
        }

        if(!empty($where)){
            $where_q = implode(" and ", $where);
            $main_query = "SELECT * FROM jobs WHERE ".$where_q;
        } else {
            $main_query = "SELECT * FROM jobs";
        }
        $page = 0;
        if(isset($request_data['page']) && !empty($request_data['page'])){
            $page = $request_data['page']-1;
        }
        $start_limit = $page*8;
        $data['search_job'] = DB::select($main_query." order by id DESC limit $start_limit, 8");
        $data['search_job_count'] = ceil(count(DB::select($main_query))/8);

        return view('Jobseeker/search',$data);

    }


}
