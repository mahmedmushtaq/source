<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 1/29/2019
 * Time: 6:52 PM
 */







$error_array = array();
$name_error = "Your name must be between 10 to 20 character";
$password_error = "Your password must be between 6 to 15 character";
$email_error = "Email is incorrect";
$phone_number_error = "Only required Pakistani phone number";
$sign_up_successfully = "Sign up successfully";
$date_time = Date_time::getNowTime();

if(isset($_POST['sign-up'])){

    $name = mysqli_real_escape_string($con,strip_tags($_POST['name']));
    $email = mysqli_real_escape_string($con,strip_tags($_POST['email']));



    $password = mysqli_real_escape_string($con,strip_tags($_POST['password']));
    $phone_number = mysqli_real_escape_string($con,strip_tags($_POST['phone_number']));
    $secure_password =  password_hash($password,PASSWORD_DEFAULT);

    if(strlen($name) < 10 || strlen($name) > 20){
        array_push($error_array,$name_error);

    }else if(!filter_var($email)){
        array_push($error_array,$email_error);

    }else if(strlen($password) < 6 || strlen($password) > 15){
        array_push($error_array,$password_error);

    }else if(strlen($phone_number) < 11 || strlen($phone_number) > 11){
        array_push($error_array,$phone_number_error);

    }

    else if(empty($error_array)){
        //firs check email is already present or not

        $generated_random_no = mt_rand(1,99);
        $admin_generated_username = str_replace(' ','_',strtolower($name));
        $admin_all_lower_case_username = strtolower($admin_generated_username);

        $check_username = mysqli_query($con,"SELECT admin_username FROM admins WHERE admin_username='$admin_all_lower_case_username'");
        if(mysqli_num_rows($check_username) > 0){
            $admin_all_lower_case_username = $admin_all_lower_case_username.$generated_random_no;
        }

        $email_check_query = mysqli_query($con,"SELECT email FROM admins WHERE email='$email'");

        if(mysqli_num_rows($email_check_query) === 0) {

            $query = mysqli_query($con,
                "INSERT INTO admins(admin_name,admin_username,email,password,phone_number,approval,date_time) VALUES ('$name','$admin_all_lower_case_username','$email','$secure_password','$phone_number','pending','$date_time')");

            if ($query) {

                //here check email
               header("Location: /source/php/admin_panel/login.php");
            }
        }else{
            $email_error = "Email is already present";
            array_push($error_array,$email_error);
        }



    }





}

?>

