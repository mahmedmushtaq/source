<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/26/2019
 * Time: 12:28 AM
 */
require "php_classes/connection.php";
require "php_classes/DateTime.php";

$echo_array = array();
$request_submit_echo = "Request is submit successfully";

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    $date_time = Date_time::getNowTime();

    $check_user_already_subscribe = mysqli_query($con,"SELECT id FROM users WHERE user_email='$email'");
    if(mysqli_num_rows($check_user_already_subscribe) === 0)
        mysqli_query($con,"INSERT INTO users (user_email,date_time) VALUES ('$email','$date_time')");

    $query_contact = mysqli_query($con,"INSERT INTO contact(full_name,email,user_message,date_time) VALUES ('$name','$email','$message','$date_time')") or die(mysqli_error($con));

    if($query_contact){
        $last_insert_id = mysqli_insert_id($con);
        $notification_link = "open_contact_request.php?id=".$last_insert_id;
        $notification_by = $email;
        $notification_type = "contactRequest";
        $notification_message = "";
        if(strlen($message) > 15){
            $notification_message = substr($message,0,15)."..";
        }else{
            $notification_message = $message;
        }

        $query_notification = mysqli_query($con,"INSERT INTO notifications(notification_by,notification_link,notification_type,notification_message,notification_open,notification_read,date_time) VALUES ('$notification_by','$notification_link','$notification_type','$notification_message','no','no','$date_time')") or die(mysqli_error($con));

        if($query_notification){
            array_push($echo_array,$request_submit_echo);
        }


    }



}
?>

<html>
<head>
    <meta charset="UTF-8" content="width=device-width,initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow">
    <title>Contact source website developer</title>
    <link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
    <link href="handlers/css/css_main/main_navbar.css" rel="stylesheet">
    <link href="handlers/css/css_main/contact.css" rel="stylesheet">



    <!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->
    <!--   -->
    <link rel="icon" type="image/jpg" href="handlers/assets/source-logo2.jpg">



</head>
<body>
<!--   ================================================  NAV-BAR ==========================================     -->

<script type="text/javascript" src="handlers/javascript/main-js-files/include_computer_navbar.js"></script>
<script type="text/javascript" src="handlers/javascript/main-js-files/include_mobile_navbar.js"></script>



<!--   ================================================== MAIN-BODY ========================================    -->
<div class="break-div"><br><br><br><br><br><br><br><br></div>

<div class="main-body">
    <br>
    <?php
    if(in_array($request_submit_echo,$echo_array)){
        echo json_encode('<br><b>'.$request_submit_echo.'</b><br>');
    }

    ?>

    <h1>Contact Us</h1><br>
    <div class="hr-line-div"><hr class="hr-line"></div><br>

    <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <textarea placeholder="Your message" name="message"></textarea><br><br>
        <input type="submit" name="submit" >

    </form>

</div>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="handlers/javascript/main-js-files/onScrollNavBar.js"></script>
</body>
</html>