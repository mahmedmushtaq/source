<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/12/2019
 * Time: 4:46 PM
 */

require "../../php_classes/connection.php";
$send_message_successfully = "Imp alert send to user successfully ";
$echo_array = array();

if(isset($_POST['submit'])){
    $message = mysqli_real_escape_string($con,$_POST['message']);


    $query = mysqli_query($con,"INSERT INTO send_important_alerts(message) VALUES ('$message') ") or die(mysqli_error($con));
    if($query){

        // ========================================= SEND MESSAGE TO USERS ===============================


        array_push($echo_array,$send_message_successfully);


    }
}

?>

<html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Imp alerts</title>

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
        }


        input[type='submit']{
            background: #34495e;
            color: white;
            border: 1px solid black;
            border-radius: 15px;

            font-family: 'Ubuntu', sans-serif;
        }

        h1{
            margin-top: 30px;
        }

        textarea{
            height: 50%;
            width: 40%;
            padding: 20px;
            font-size: 1.1em;
            font-family: var(--default-font);

        }

        @media (max-width: 769px) {
            input{
                width: 80%;
            }
            textarea{
                width: 80%;

            }
        }


    </style>
</head>
<body>
<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>
<br><br><br><br>


<h1>Send important alerts to users</h1><br><br>

<form action="imp_alerts.php" method="post">
<!--    <input name="email" type="text" placeholder="Enter user email"><br><br>-->
    <textarea name="message" placeholder="Here enter your important message and this is send to all users"></textarea><br><br>
    <input type="submit" name="submit" value="send message"><br><br>

    <?php
    if(in_array($send_message_successfully,$echo_array)){
        echo $send_message_successfully;
    }

    ?>





</form>

<br><br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>


</body>

</html>
