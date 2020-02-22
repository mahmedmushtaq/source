<?php
require "../../php_classes/connection.php";
require "../../php_classes/check_login_session.php";


if(isset($_GET['value'])){
    if($_GET['value'] === "logout") {
        session_destroy();
        header('Location: login.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Settings</title>
    <script src="../../handlers/javascript/admin-js-files/main-style-files/adminHeaderLinksFile.js"></script>
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/align_content_center_style_sheet.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



</head>
<body>

<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>
<br><br><br>

<div class="content">
    <h1 class="heading">Settings</h1>
    <div class="hr-line-div"><hr class="hr-line"></div><br>


    <div class="holder">
        <h3><a href="categories"> Add Categories</a></h3>
        <div class="hr-line-div"><hr class="hr-line"></div>
    </div>

    <div class="holder">
        <h3><a href="account_info_update"> Update Info</a></h3>
        <div class="hr-line-div"><hr class="hr-line"></div>
    </div>

    <div class="holder">
        <h3><a href="imp_alerts">Imp alerts</a></h3>
        <div class="hr-line-div"><hr class="hr-line"></div>
    </div>



    <div class="holder">
        <h3><a href="settings.php?value=logout">logout</a></h3>
        <div class="hr-line-div"><hr class="hr-line"></div>
    </div>



    <br><br>

<!--    <a href="#">Next</a>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>-->

</div>


<br><br><br><br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>

</body>
</html>