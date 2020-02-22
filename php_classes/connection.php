<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 1/29/2019
 * Time: 3:13 PM
 */


session_start();
$username = "root";
$password = "";
$database_name = "source";
$con = mysqli_connect("localhost","root","","sourcedb");
if(!$con){
    echo "mysqli error are = ".mysqli_error($con);
}

?>