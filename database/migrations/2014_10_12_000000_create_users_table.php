<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company_name');
            $table->rememberToken();
            $table->timestamps();
            $table->string('company_name',100)->nullable();
            $table->text('about_company')->nullable();
            $table->string('web-site',100)->nullable();
            $table->integer('mobile_number',10)->nullable();
            $table->string('state',70)->nullable();
            $table->string('city',70)->nullable();
            $table->string('confirm_password',255)->nullable();
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->integer('adharcard_number',20)->nullable();
            $table->string('proofid_number',50)->nullable();
            $table->string('age',50)->nullable();
            $table->string('gender',50)->nullable();
            $table->string('job_profile',300)->nullable();
            $table->string('skills',300)->nullable();
            $table->string('job_city',200)->nullable();
            $table->string('education',100)->nullable();
            $table->string('job_working',100)->nullable();
            $table->string('currently_working',50)->nullable();
            $table->string('curlast_company',150)->nullable();
            $table->string('job_time',50)->nullable();
            $table->string('salary',100)->nullable();
            $table->string('language',200)->nullable();
            $table->tinyInteger('user_type',1)->default('2')->comment('0=company ,\r\n 1=individual ,\r\n 2=jobseeker');
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
