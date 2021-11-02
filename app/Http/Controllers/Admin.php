<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class Admin extends Controller
{

    public function inactive()
    {
        $data['inactive']= Job::orderBy('id','DESC')->where('job_status','=','0')->get();
        return view('Admin/inactive',$data);
    }
    public function active()
    {
        $data['active']= Job::orderBy('id','DESC')->where('job_status','=','1')->get();
        return view('Admin/active',$data);
    }
    public function detail($id)
    {
        $data['tbl_job']    =   Job::where('id',$id)->first();
        return view('Admin/detail',$data);
    }
    public function inactivestatus($id)
    {
        Job::where('id',$id)->update(array('job_status'=>1));
        return back();
    }
}
