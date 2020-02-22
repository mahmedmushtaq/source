<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 4/1/2019
 * Time: 3:39 PM
 */
require "../../../php_classes/connection.php";
if(isset($_POST['submit'])){

    $reply_to_user = mysqli_real_escape_string($con,$_POST['reply_to_user']);

     $email = $_GET['email'];
    if(str_word_count($reply_to_user) > 10 && str_word_count($reply_to_user) < 1000 ){
        echo "message successfully send.This feature coming soon";
        // SendMail::sendSimpleEmail($reply_to_user,$user_email);
        header("Refresh:5; url=../notifications.php");
    }else{
        echo "Your reply must contain character b/w 10 to 1000";
    }

}
