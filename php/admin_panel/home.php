<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/11/2019
 * Time: 11:55 PM
 */
require "../../php_classes/connection.php";

$print = "";


if(isset($_POST['submit'])){
    $value = mysqli_real_escape_string($con,$_POST['key']);
    if($value === "xyj@%9"){
        $_SESSION['key'] = "start";
         $print = "session_started";
    }else{

        $print = "invalid key";
    }
}


?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <!--    The spider will not look at this page but will crawl through the rest of the pages on your website.-->
    <meta name="robots" content="noindex, nofollow">
    <title>Please Enter Secret Key</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0" >
    <link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
           text-align: center;
           padding: 20px;
        }
    h1{
        text-align: center;
        font-family:'Sniglet', cursive;;
        font-size: 3em;
        margin-top: 70px;
    }

        input{
            width: 40%;
            font-family: 'Sniglet', cursive;;
            font-size: 1.5em;
            color: black;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;

        }

        input[type="submit"]{
            padding: 20px;

            background: #27ae60;
            border: 1px solid white;

            border-radius: 15px;
            margin-top: 20px;
            color: white;

        }
        #key{
            margin-top: 70px;
        }
        hr{
            width: 25%;
            margin: 30px auto;
        }
        a{
            color: blue;
            text-decoration: none;
            font-size: 1.3em;
            font-family: 'Oxygen', sans-serif;
        }

        @media (max-width: 769px) {
            input{
                width: 90%;
            }
        }

    </style>
</head>
<body>

    <h1>Please Enter A Secret Key</h1>
    <hr>

    <form action="home.php" method="post">


     <input id="key" type="password" name="key" placeholder="Key" ><br>
    <input type="submit" name="submit"><br><br>
        <?php
        if($print !== ""){
            echo $print;
        }

        ?>

    </form><br>

    <?php

    $link = '<a href="login.php" >Login</a><br>
    <a href="signup.php" >Sign up</a>';

    if($print === "session_started"){
        echo html_entity_decode($link);
    }

?>




</body>

