<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 3/29/2019
 * Time: 3:13 PM
 */

require "../../php_classes/connection.php";
require "../../php_classes/check_login_session.php";
require "../../php_classes/SendMail.php";
require "../../php_classes/notification_handler.php";


$id = 0;
$name = "";
$email = "";
$notification_message = "";
if(isset($_GET['id'])){
  $id = mysqli_real_escape_string($con,$_GET['id']);
  $query = mysqli_query($con,"SELECT * FROM notifications WHERE id='$id'");
  if($query){
      $row = mysqli_fetch_array($query);
      $name = $row['notification_by'];
      $notification_id = $row['id'];

      $notification_link = $row['notification_link'];
      $id_get = substr($notification_link,strrpos($notification_link,"=")+1,strlen($notification_link)-1);
      $id_contact = $id_get+0;


      $query_contact = mysqli_query($con,"SELECT * FROM contact WHERE id='$id_contact'");
      $row_contact = mysqli_fetch_array($query_contact);

      $notification_message = $row_contact['user_message'];
      $email = $row_contact['email'];

      Notification::notificationRead($con,$notification_id);

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
   <link rel="stylesheet" href="../../handlers/css/form_stylesheet.css">
</head>
<body>

<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>

<br><br><br><br><br>
<div class="content">

    <h1>Reply to users</h1><br><br>

    <form method="post" action="data/reply_contact_request_email_to_user.php?email=<?php echo $email;?>">

        <input name="name" type="text" placeholder="User name" value="<?php echo $name;?>" disabled>


        <input name="email" type="email" placeholder="User email" value="<?php echo $email;?>" disabled>



        <textarea name="message" placeholder="User message"  disabled> <?php echo $notification_message;?></textarea>

        <textarea name="reply_to_user" placeholder="Your reply send to user email" ></textarea>


        <input name="submit" type="submit" placeholder="submit">




    </form>


</div>



</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>

</html>
