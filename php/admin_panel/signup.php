<?php
include "../../php_classes/connection.php";
include "../../php_classes/DateTime.php";

include "form_handler/sign-up-handler.php";
require "../../php_classes/check_key_session.php";

?>



<html>
<head>

    <meta name="viewport" charset="UTF-8" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Store sign up</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/login.css">
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/signup.css">


</head>
<body>

<div class="form-container">

    <form method="post" id="sign-up-form" action="signup.php">
        <h1>Sign up</h1>
        <input name="name" type="text" placeholder="Full name"><br><br><br>
        <?php
        if(in_array($name_error,$error_array)){
            echo "<br>".$name_error."<br>";
        }

        ?>
        <input name="email" type="email" placeholder="Email"><br><br><br>
        <?php

        if(in_array($email_error,$error_array)){
            echo "<br>".$email_error."<br>";
        }


        ?>




        <input name="password" type="Password" placeholder="Password ( 6 digits or more)"><br><br><br>
        <?php
        if(in_array($password_error,$error_array)){
            echo "<br>".$password_error."<br>";
        }

        ?>



        <input name="phone_number" type="number" placeholder="Phone number"><br><br><br>


        <?php
        if(in_array($phone_number_error,$error_array)){
            echo "<br>".$phone_number_error."<br>";
        }

        ?>

        <!--<input name="admin-category" type="text" placeholder="Admin category"><br><br><br>-->
        <!--<div class="check-box-div"> <input type="checkbox" name="admin" value="admin" class="check"><label>Become admin</label></div><br><br>-->
        <input name="sign-up" type="submit" placeholder="submit" class="submit" value="Sign up"><a class="signup" href="login.php">Already member !</a>

        <?php
        if(in_array($sign_up_successfully,$error_array)){
            echo "<br>". $sign_up_successfully."<br>";
        }

        ?>

    </form>



</div>

<!--src files-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="../../javascript/admin-js-files/sign-up.js"></script>-->

</body>
</html>



