<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->text('job_title');
            $table->text('job_role');
            $table->text('job_slug');
            $table->string('work_home',50);
            $table->string('job_type',50);
            $table->string('job_day',50);
            $table->string('job_duration',100);
            $table->integer('min_salary');
            $table->integer('max_salary');
            $table->string('company_opening',20);
            $table->string('company_job_days',100);
            $table->text('job_time_start');
            $table->text('job_time_end');
            $table->string('company_education',100);
            $table->string('experience_custom',100);
            $table->string('min_experience',20);
            $table->string('max_experience',20);
            $table->string('gender',10);
            $table->text('skills')->default('java');
            $table->text('qualification');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->string('language',255)->default('English','Hindi');
            $table->string('benefits',200);
            $table->text('job_desc');
            $table->string('candidates_contact',50);
            $table->string('business_type',50);
            $table->text('company_name');
            $table->string('state',100);
            $table->string('city',100);
            $table->text('company_address');
            $table->string('con_name',30);
            $table->string('con_number',10);
            $table->string('con_email',100);
            $table->foreignId('employer_id');
            $table->tinyInteger('job_status',1)->default('0')->comment('0=Inactive Job,\r\n1=Active Job');
            $table->dateTime('creation_date');
            $table->timestamp('updated_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
