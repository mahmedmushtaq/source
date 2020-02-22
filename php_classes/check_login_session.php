<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 3/2/2019
 * Time: 11:59 AM
 */

if(isset($_SESSION['email'])){
    $login_email =  $_SESSION['email'];
}else{
    header("Location: login.php");
}

