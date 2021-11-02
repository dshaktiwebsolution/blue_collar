<?php

use App\Models\Job;
use Illuminate\Support\Facades\DB;


function time_elapsed_string($datetime, $full = false) {

    $now = new DateTime;

    $ago = new DateTime($datetime);

    $diff = $now->diff($ago);



    $diff->w = floor($diff->d / 7);

    $diff->d -= $diff->w * 7;



    $string = array(

        'y' => 'year',

        'm' => 'month',

        'w' => 'week',

        'd' => 'day',

        'h' => 'hour',

        'i' => 'minute',

        's' => 'second',

    );

    foreach ($string as $k => &$v) {

        if ($diff->$k) {

            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');

        } else {

            unset($string[$k]);

        }

    }



    if (!$full) $string = array_slice($string, 0, 1);

    return $string ? implode(', ', $string) . ' ago' : 'just now';

}

function get_slug($string){

    $new_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    $main_slug = $new_slug;
    $is_new_slug = 0;
    $count = 1;

    while($is_new_slug==0){
        $is_exist = DB::select("SELECT * FROM jobs WHERE job_slug='$new_slug'");
    
        if(empty($is_exist)){
            $is_new_slug = 1;
            break;
        }else{
            $new_slug = $main_slug."-".$count;
            $count++;
        }

    }

    return $new_slug;
}