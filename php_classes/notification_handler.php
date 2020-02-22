<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 3/29/2019
 * Time: 2:34 PM
 */
class Notification{
    public  static function sendNotification($con,$notification_by,$notification_link,$notification_type,$notification_message,$notification_open,$notification_read,$date_time){
        $query_not =  mysqli_query($con,"INSERT INTO notifications(notification_by,notification_link,notification_type,notification_message,notification_open,notification_read,date_time) VALUES ('$notification_by','$notification_link','$notification_type','$notification_message','$notification_open','$notification_read','$date_time') ") or die(mysqli_error($con));

    }

    public static function notificationOpen($con,$id){
        mysqli_query($con,"UPDATE notifications SET notification_open='yes' WHERE id='$id'") or die (mysqli_error($con));
    }


    public static function notificationRead($con,$id){
        mysqli_query($con,"UPDATE notifications SET notification_read='yes' WHERE id='$id'") or die (mysqli_error($con));
    }
}