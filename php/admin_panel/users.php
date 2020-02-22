<?php
require "../../php_classes/connection.php";

$users_email = array();
$no_of_users = 0;
$query_get_no_users = mysqli_query($con,"SELECT id FROM users");
$no_of_users =  mysqli_num_rows($query_get_no_users);
$get_last_id = 0;
$query = false;

if(isset($_GET['last_id'])){
    $last_id = mysqli_real_escape_string($con,$_GET['last_id']);
    $query = mysqli_query($con,"SELECT id,user_email FROM users WHERE id < $last_id ORDER BY id  DESC LIMIT 30");
}else{
    $query = mysqli_query($con,"SELECT id,user_email FROM users ORDER BY id  DESC LIMIT 30");
}



while($row = mysqli_fetch_array($query)){
    $users_email[] = $row['user_email'];
    $get_last_id = $row['id'];
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Users</title>
    <script src="../../handlers/javascript/admin-js-files/main-style-files/adminHeaderLinksFile.js"></script>
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/align_content_center_style_sheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>

<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>
<br><br><br>

<div class="content">
    <h1 class="heading">Users</h1>
    <div class="hr-line-div"><hr class="hr-line"></div><br>

   <?php echo html_entity_decode("<h4>No of users <b style=\"color: blue;\">".$no_of_users."</b> </h4><br>")?>

    <?php
    for($x = 0;$x < sizeof($users_email);$x++) {


            $html_data = '<div class="holder">
            <h3>'.$users_email[$x].'</h3>
            <div class="hr-line-div"><hr class="hr-line"></div>
        </div>';

            echo html_entity_decode($html_data);

    }
    ?>






    <br><br>

    <?php

    echo
    html_entity_decode('<a href="users.php?last_id='.$get_last_id.'">Next</a>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>');

    ?>

</div>


<br><br><br><br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>

</body>
</html>