<?php

namespace App\Http\Controllers;
//require __DIR__ . '/vendor/autoload.php';
//require __DIR__ . '/twilio-php-main/src/Twilio/autoload.php';
require __DIR__ . '/../../../twilio-php-main/src/Twilio/autoload.php';

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\User;

class ChatBotController extends Controller
{
    public function __construct(Request $request){
        session_start();

        $from = $request->input('From');
        $body = $request->input('Body');
        // mail('')

        $client = new \GuzzleHttp\Client();
        try {
            // Schema::create('sessions', function ($table) {
            //     $table->string('id')->primary();
            //     $table->foreignId('user_id')->nullable()->index();
            //     $table->string('ip_address', 45)->nullable();
            //     $table->text('user_agent')->nullable();
            //     $table->text('payload');
            //     $table->integer('last_activity')->index();
            // });
            // Log::info('This is some useful information.');

            //$_SESSION = array('');
            $full_htm ='';
            if(!isset($_SESSION['first_name'])){
                $first = $this->sendWhatsAppMessage("Enter Your First Name", $from);
                $_SESSION['first_name'] = 1;
                    die;
            }else{
                if(!isset($_SESSION['first_name_rep'])){
                    $_SESSION['first_name_rep'] = $body;

                }
            }

            if(!isset($_SESSION['last_name'])){
                 $last = $this->sendWhatsAppMessage("Enter Your Last Name", $from);
                    $_SESSION['last_name'] = 1;
                    die;
            }else{
                if(!isset($_SESSION['last_name_rep'])){
                    $_SESSION['last_name_rep'] = $body;
                }
            }

            if(!isset($_SESSION['mobile_number'])){
                 $last = $this->sendWhatsAppMessage("Enter Your Mobile Number", $from);
                    $_SESSION['mobile_number'] = 1;
                    die;
            }else{
                if(!isset($_SESSION['mobile_number_rep'])){
                    $_SESSION['mobile_number_rep'] = $body;
                }
            }

            if(!isset($_SESSION['email_address'])){
                 $email_address = $this->sendWhatsAppMessage("Enter Your Email Address", $from);
                    $_SESSION['email_address'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['email_address_rep'])){
                    $_SESSION['email_address_rep'] = $body;
                }
            }

            if(!isset($_SESSION['addhar_card'])){
                 $addhar_card = $this->sendWhatsAppMessage("Enter Your Addhar Card Number", $from);
                    $_SESSION['addhar_card'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['addhar_card_rep'])){
                    $_SESSION['addhar_card_rep'] = $body;
                }
            }

            if(!isset($_SESSION['proof_id'])){
                 $addhar_card = $this->sendWhatsAppMessage("Enter Your Proof ID Number", $from);
                    $_SESSION['proof_id'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['proof_id_rep'])){
                    $_SESSION['proof_id_rep'] = $body;
                }
            }

            if(!isset($_SESSION['upload_image'])){
                 $upload_image = $this->sendWhatsAppMessage("Upload Your ID Image", $from);
                    $_SESSION['upload_image'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['upload_image_rep'])){
                    $_SESSION['upload_image_rep'] = $body;
                }
            }

            if(!isset($_SESSION['age'])){
                 $upload_image = $this->sendWhatsAppMessage("Enter Your Age", $from);
                    $_SESSION['age'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['age_rep'])){
                    $_SESSION['age_rep'] = $body;
                }
            }

            if(!isset($_SESSION['gender'])){
                 $upload_image = $this->sendWhatsAppMessage("What is Your Gender? 1. Male 2. female", $from);
                    $_SESSION['gender'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['gender_rep'])){
                    $_SESSION['gender_rep'] = $body;
                }
            }

            if(!isset($_SESSION['job_profile'])){
                 $job_profile = $this->sendWhatsAppMessage("What is your Job Profile", $from);
                    $_SESSION['job_profile'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['job_profile_rep'])){
                    $_SESSION['job_profile_rep'] = $body;
                }
            }

            if(!isset($_SESSION['skills'])){
                 $skills = $this->sendWhatsAppMessage("What is your Skills", $from);
                    $_SESSION['skills'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['skills_rep'])){
                    $_SESSION['skills_rep'] = $body;
                }
            }

            if(!isset($_SESSION['preferred_city_jobs'])){
                 $preferred_city_jobs = $this->sendWhatsAppMessage("Preferred City for Job", $from);
                    $_SESSION['preferred_city_jobs'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['preferred_city_jobs_rep'])){
                    $_SESSION['preferred_city_jobs_rep'] = $body;
                }
            }

            if(!isset($_SESSION['education'])){
                 $preferred_city_jobs = $this->sendWhatsAppMessage("Enter Your Education", $from);
                    $_SESSION['education'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['education_rep'])){
                    $_SESSION['education_rep'] = $body;
                }
            }


            if(!isset($_SESSION['experience'])){
                 $experience = $this->sendWhatsAppMessage("What is Your Experience? 1. Experience 2. Fresher", $from);
                    $_SESSION['experience'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['experience_rep'])){
                    $_SESSION['experience_rep'] = $body;
                }
            }

            if(!isset($_SESSION['working'])){
                 $experience = $this->sendWhatsAppMessage("You are Currently Working 1. Yes 2. No", $from);
                    $_SESSION['working'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['working_rep'])){
                    $_SESSION['working_rep'] = $body;
                }
            }

            if(!isset($_SESSION['salary'])){
                 $salary = $this->sendWhatsAppMessage("What is your Salary(If Experienced)", $from);
                    $_SESSION['salary'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['salary_rep'])){
                    $_SESSION['salary_rep'] = $body;
                }
            }

            if(!isset($_SESSION['lanauage'])){
                 $lanauage = $this->sendWhatsAppMessage("What is Lanauage(Speaking and Writing)", $from);
                    $_SESSION['lanauage'] = 1;
                    die; 
            }else{
                if(!isset($_SESSION['lanauage_rep'])){
                    $_SESSION['lanauage_rep'] = $body;
                }
            }

            if(!isset($_SESSION['resume'])){
                 $resume = $this->sendWhatsAppMessage("Upload Your Resume", $from);
                    $_SESSION['resume'] = 1;
                
                    die; 
            }else{
                if(!isset($_SESSION['resume_rep'])){
                    $_SESSION['resume_rep'] = $body;
                  /*  $full_htm .= "Your First Name : ".$_SESSION['first_name_rep']." /n";
                    $full_htm .= "Your Last Name : ".$_SESSION['last_name_rep']." /n";*/
                    $full_htm .= "Your First Name : ".$_SESSION['first_name_rep']." /n";
                    $full_htm .= "Your Last Name : ".$_SESSION['last_name_rep']." /n";
                    $full_htm .= "Your Mobile Number : ".$_SESSION['mobile_number_rep']." /n";
                    $full_htm .= "Your Email Address : ".$_SESSION['email_address_rep']." /n";
                    $full_htm .= "Your Addhar Card Number : ".$_SESSION['addhar_card_rep']." /n";
                    $full_htm .= "Your Proof ID Number : ".$_SESSION['proof_id_rep']." /n";
                    $full_htm .= "Your Age : ".$_SESSION['age_rep']." /n";
                    $full_htm .= "Your Gender : ".$_SESSION['gender_rep']." /n";
                    $full_htm .= "Your Job Profile : ".$_SESSION['job_profile_rep']." /n";
                    $full_htm .= "Your Skills : ".$_SESSION['skills_rep']." /n";
                    $full_htm .= "City for Job : ".$_SESSION['preferred_city_jobs_rep']." /n";
                    $full_htm .= "Your Education : ".$_SESSION['education_rep']." /n";
                    $full_htm .= "Your Experience : ".$_SESSION['experience_rep']." /n";
                    $full_htm .= "Currently Working : ".$_SESSION['working_rep']." /n";
                    $full_htm .= "Your Expected Salary : ".$_SESSION['salary_rep']." /n";
                    $full_htm .= "Lanauage : ".$_SESSION['lanauage_rep']." /n";
                    $this->sendWhatsAppMessage(implode(',', $_SESSION), $from);
                    $thank = $this->sendWhatsAppMessage("Thank You for Register", $from);
                }
            }

            $user = User::create(['first_name' => $_SESSION['first_name_rep'],'last_name' => $_SESSION['last_name_rep'],'mobile_number' => $_SESSION['mobile_number_rep'],'email' => $_SESSION['email_address_rep'],'adharcard_number' => $_SESSION['addhar_card_rep'],'age' => $_SESSION['age_rep'],'gender' => $_SESSION['gender_rep'],'job_profile' => $_SESSION['job_profile_rep'],'skills' => $_SESSION['skills_rep'],'education' => $_SESSION['education_rep'],'job_working' => $_SESSION['working_rep'],'salary' => $_SESSION['salary_rep'],'language' => $_SESSION['lanauage_rep'],'proofid_number' => $_SESSION['proof_id_rep'],'job_city' => $_SESSION['preferred_city_jobs_rep']]);

            
            // $_SESSION['experience_rep']
            // $_SESSION['upload_image_rep']
            // $_SESSION['resume_rep']

            // 'name',
            // 'password',
            // 'company_name',
            // 'about_company',
            // 'web-site',
            // 'state',
            // 'city',
            // 'confirm_password',
            // 'currently_working',
            // 'curlast_company',
            // 'job_time',
            // 'user_type'

            /*if($body == 'hii'){                   
            }*/
            
            /*$response = $client->request('GET', "https://api.github.com/users/$body");
            $githubResponse = json_decode($response->getBody());
            if ($response->getStatusCode() == 200) {
                $message = "*Name:* $githubResponse->name\n";
                $message .= "*Bio:* $githubResponse->bio\n";
                $message .= "*Lives in:* $githubResponse->location\n";
                $message .= "*Number of Repos:* $githubResponse->public_repos\n";
                $message .= "*Followers:* $githubResponse->followers devs\n";
                $message .= "*Following:* $githubResponse->following devs\n";
                $message .= "*URL:* $githubResponse->html_url\n";
                $this->sendWhatsAppMessage($message, $from);*/
            // } else {
            //     $this->sendWhatsAppMessage($githubResponse->message, $from);
            // }
        } catch (RequestException $th) {
           
            $response = json_decode($th->getResponse()->getBody());
            $this->sendWhatsAppMessage($response->message, $from);
        }
        return;
    }
    public function listenToReplies(Request $request)
    {
        $from = $request->input('From');
        $body = $request->input('Body');
        echo 12123132132; die;
        $client = new \GuzzleHttp\Client();
        try {
             $this->sendWhatsAppMessage("Tell us your first name", $from);
            // $response = $client->request('GET', "https://api.github.com/users/$body");
            // $githubResponse = json_decode($response->getBody());
            // if ($response->getStatusCode() == 200) {
            //     $message = "*Name:* $githubResponse->name\n";
            //     $message .= "*Bio:* $githubResponse->bio\n";
            //     $message .= "*Lives in:* $githubResponse->location\n";
            //     $message .= "*Number of Repos:* $githubResponse->public_repos\n";
            //     $message .= "*Followers:* $githubResponse->followers devs\n";
            //     $message .= "*Following:* $githubResponse->following devs\n";
            //     $message .= "*URL:* $githubResponse->html_url\n";
            //     $this->sendWhatsAppMessage($message, $from);
            // } else {
            //     $this->sendWhatsAppMessage($githubResponse->message, $from);
            // }
        } catch (RequestException $th) {
            $response = json_decode($th->getResponse()->getBody());
            $this->sendWhatsAppMessage($response->message, $from);
        }
        return;
    }

    /**
     * Sends a WhatsApp message  to user using
     * @param string $message Body of sms
     * @param string $recipient Number of recipient
     */
    public function sendWhatsAppMessage(string $message, string $recipient)
    {
        $twilio_whatsapp_number = getenv('TWILIO_WHATSAPP_NUMBER');
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");

        $client = new Client($account_sid, $auth_token);
        return $client->messages->create($recipient, array('from' => "whatsapp:$twilio_whatsapp_number", 'body' => $message));
    }
}