
<?php
require "../../php_classes/connection.php";
require "../../php_classes/check_key_session.php";
require "form_handler/login-handler.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="../../handlers/css/admin_panel_stylesheets/login.css" rel="stylesheet">
</head>
<body>

<div class="form-container">

    <form class="form" method="post" action=login.php>
        <h1>Login Admin</h1>
        <input name="email" type="email" placeholder="Email"><br><br><br>
        <?php
         if(in_array($email_error,$error_array)){
             echo $email_error;
         }

        ?>
        <input name="password" type="password" placeholder="Password"><br><br><br>

        <?php
        if(in_array($password_error,$error_array)){
            echo $password_error;
        }

        ?>


        <input name="submit" type="submit" placeholder="submit" class="submit" value="Login">

    </form>


</div>


</body>
</html>