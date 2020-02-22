<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 4/1/2019
 * Time: 3:25 PM
 */

class SendMail{
    public static function  sendSimpleEmail($user_message,$to){
        $message = '<html><body>';
        $message .= '<h1>'.$user_message.'</h1>';
        $message .= '</body></html>';
        $subject = 'Your contact Response';

        $headers = "";
        $headers .= "From: Source Website <admin@source.com> \r\n";

        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        if(mail($to,$subject,$message,$headers))
            return true;
        else return false;
    }
}