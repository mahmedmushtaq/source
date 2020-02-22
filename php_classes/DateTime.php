<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 3/21/2019
 * Time: 3:00 PM
 */
//date_default_timezone_set("UTC");
date_default_timezone_set("UTC");
class Date_time{
    public static function getNowTime(){

        return gmdate("Y-m-d H:i:s");
    }

    public static function convertDateTime($server_date){


       $date_time_now = gmdate("Y-m-d H:i:s");

        $start_date = new DateTime($server_date);
        $end_date = new DateTime($date_time_now);
        $interval = $start_date->diff($end_date);

        $time_message = "";

        if($interval->y >= 1){
            //for year
            if($interval->y == 1){
                $time_message = $interval->y ." year ago";
            } else $time_message = $interval->y ." years ago";

        } else if($interval-> m >= 1) {
            //for month
            if($interval->d == 0){
                $days = " ago";
            } else if($interval->d == 1)
                $days = $interval->d." day ago";
            else $days = $interval->d." days ago";
            if($interval->m == 1)
            {
                $time_message = $interval->m ." month ".$days;
            }else
                $time_message = $interval->m ." month ".$days;
        }

        else if($interval->d >= 1){
            //for days
            if($interval->d == 1)
                $time_message = " Yesterday";
            else
                $time_message = $interval->d." days ago";
        }else if($interval->h >= 1){
            // for hours
            if($interval->h == 1)
                $time_message = $interval->h ." hour ago";
            else $time_message = $interval->h." hours ago";

        } else if($interval->i >= 1){
            //for minutes
            if($interval->i == 1)
                $time_message = $interval->i ." min ago";
            else $time_message = $interval->i." min ago";

        }else {
            // for seconds
            if($interval->s <= 30)
                $time_message = " Just now";
            else  $time_message = $interval->s." seconds ago";
        }


        return $time_message;


    }
}