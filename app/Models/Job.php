<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
//    protected $timetamps=false;
    protected $table='jobs';
    protected $fillable=['job_title','job_role','job_slug','work_home','job_type','job_day','job_duration','min_salary','max_salary','company_opening','company_job_days','job_time_start','job_time_end','company_education','experience_custom','min_experience','max_experience','gender','skills','qualification','min_age','max_age','language','benefits','job_desc','candidates_contact','business_type','company_name','state','city','company_address','con_name','con_number','con_email','job_time','employer_id'];

}
