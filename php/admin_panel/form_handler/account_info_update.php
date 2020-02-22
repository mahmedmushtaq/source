<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/12/2019
 * Time: 3:51 PM
 */



$admin_username = $_SESSION['admin_username'];

$query = mysqli_query($con,"SELECT * FROM admins WHERE admin_username='$admin_username'");
$row = mysqli_fetch_array($query);

$admin_email = $row['email'];
$admin_name = $row['admin_name'];

$echo_array = array();
$update_successful_echo  = "successfully update";



