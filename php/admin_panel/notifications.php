<?php
require "../../php_classes/connection.php";
require "../../php_classes/DateTime.php";
require "../../php_classes/check_login_session.php";
require "../../php_classes/notification_handler.php";

$notifications_date_time = array();
$notification_link = array();
$notification_read = array();
$notification_message = array();
$notification_id = array();
$last_id = 0;
$notification_by = array();



if(isset($_GET['load_more_last_id'])){
      $last_get_id = mysqli_real_escape_string($con,$_GET['load_more_last_id']);
      loadData($last_get_id);
}else{
    loadData(0);
}


function loadData($load_more_id){

    $query = "";
    global $notifications_date_time ;
    global $notification_link ;
    global $notification_read;
    global $notification_message;
    global $notification_id ;
    global $last_id;
    global $con;
    global $notification_by;


 if($load_more_id > 0){
     $query = mysqli_query($GLOBALS['con'],"SELECT * FROM notifications WHERE (notification_open='no' OR notification_read='no') AND id > $load_more_id ORDER BY id ASC LIMIT 20");

 }else {
     $query = mysqli_query($GLOBALS['con'], "SELECT * FROM notifications WHERE notification_open='no' OR notification_read='no' ORDER BY id ASC LIMIT 20");
 }
 while($row = mysqli_fetch_array($query)){


         $notification_read[] = $row['notification_read'];
         $notification_link[] = $row['notification_link'];
         $notification_message[] = $row['notification_message'];
         $notification_id[] = $row['id'];
         $notifications_date_time[] = Date_time::convertDateTime($row['date_time']);
         $last_id = $row['id'];
         $notification_by[] = $row['notification_by'];

         if($row['notification_open'] === "no") {
            Notification::notificationOpen($GLOBALS['con'],$last_id);
         }


 }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Notifications</title>

    <script src="../../handlers/javascript/admin-js-files/main-style-files/adminHeaderLinksFile.js"></script>
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/notification.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>

<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>

<br><br><br>

<div class="content">

    <h1 class="heading">Notifications</h1>
    <div class="hr-line-div"><hr class="hr-line"></div>
    <br><br><br>

    <?php
    for($x = 0;$x<sizeof($notification_read);$x++) {



             $html_decode = ' <div class="notification-container" >
      
              <a class="notification-a" href="' . $notification_link[$x] . '">
              <h5 style="margin-bottom: 6px;">' . $notification_by[$x] . '&nbsp;&nbsp;&nbsp;<b style="font-size: 10px;">' . $notifications_date_time[$x] . '</b></h5>
            <p>' . $notification_message[$x] . '
             </p>
              </a>
                <div class="hr-line-div "><hr class="hr-line notification-below-line"></div>
            </div>';
             //

             echo html_entity_decode($html_decode . "<br>");




    }

?>


   <?php
    $html_decode_a = '<a href="notifications.php?load_more_last_id='.$last_id.'">Next</a>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>';
    echo html_entity_decode($html_decode_a);

?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>
</body>
</html>