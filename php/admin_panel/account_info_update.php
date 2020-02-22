<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/12/2019
 * Time: 3:50 PM
 */
require "../../php_classes/connection.php";
require "../../php_classes/check_login_session.php";
require "form_handler/account_info_update.php";

if(isset($_POST['update'])){
    $update_email = mysqli_real_escape_string($con,$_POST['update_email']);
    $update_name = mysqli_real_escape_string($con,$_POST['update_name']);
    $update_password = mysqli_real_escape_string($con,$_POST['update_password']);

    $admin_username = $_SESSION['admin_username'];

    if($update_password !== "" && $update_email !== "" && $update_name !== "") {
        $secure_password = password_hash($update_password,PASSWORD_DEFAULT);
        $query = mysqli_query($con, "UPDATE admins SET email='$update_email' , password='$secure_password' , admin_name='$update_name' where admin_username='$admin_username'") or die(mysqli_error($con));
        if ($query) {
            array_push($echo_array, $update_successful_echo);
        }
    }

}



?>



<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <!--    The spider will not look at this page but will crawl through the rest of the pages on your website.-->
    <meta name="robots" content="noindex, nofollow">
    <title>Account Info</title>

    <script src="../../handlers/javascript/admin-js-files/main-style-files/adminHeaderLinksFile.js"></script>
    <style>
        body{
            text-align: center;
            font-family: var(--default-font);

        }
        input{
            width: 40%;
            font-size: 1.2em;
            padding: 20px;
            font-family: var(--default-font);
        }

        input[type='submit']{
            background: #34495e;
            color: white;
            border: 1px solid black;
            border-radius: 15px;
        }

        h1{
            margin-top: 30px;
        }

        @media (max-width: 769px) {
            input{
                width: 80%;
            }
        }


    </style>
</head>
<body>
<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>
<br><br><br><br>


<h1>Update Info</h1><br><br><br>

<form action="account_info_update.php" method="post">
    <input name="update_name"  type="text" placeholder="change your name" value="<?php echo $admin_name;?>"><br><br>
    <input name="update_email" type="text" placeholder="change your email" value="<?php echo $admin_email;?>"><br><br>
    <input name="update_password" type="text" placeholder="change your password"><br>
    <p>write previous password if you do not want to change your password</p><br><br>
    <input type="submit" name="update" value="update"><br>

    <?php
    if(in_array($update_successful_echo,$echo_array)){
        echo $update_successful_echo . " please refresh a page";
    }

    ?>



</form>

<br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>
</body>

</html>
