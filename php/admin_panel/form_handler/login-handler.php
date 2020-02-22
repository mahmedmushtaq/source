<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 2/7/2019
 * Time: 3:07 PM
 */

$email_error = "Email is incorrect OR account is not proved";
$password_error = "Password is incorrect";
$error_array  = array();
if(isset($_POST['submit'])){
    $email  = mysqli_real_escape_string($con,strip_tags($_POST['email']));
    $password  = mysqli_real_escape_string($con,strip_tags($_POST['password']));

    $check = mysqli_query($con,"SELECT * FROM admins WHERE email='$email' AND approval='proved'") or die(mysqli_error($con));
    if(mysqli_num_rows($check) > 0){
        $row = mysqli_fetch_array($check);
        $password_hash = $row['password'];
        if(password_verify($password,$password_hash)){
            $_SESSION['email'] = $email;
            $_SESSION['admin_name'] = $row['admin_name'];
            $_SESSION['admin_username'] = $row['admin_username'];
            header("Location: ../file/admin_home.php");

        }else{
            array_push($error_array,$password_error);
        }
    } else{
        array_push($error_array,$email_error);
    }
}

