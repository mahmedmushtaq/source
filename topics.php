<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/25/2019
 * Time: 7:03 PM
 */

require "php_classes/connection.php";
?>

<html>
<head>
    <meta charset="UTF-8" content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
    <link href="handlers/css/css_main/main_navbar.css" rel="stylesheet">
    <link href="handlers/css/css_main/topics.css" rel="stylesheet">



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

    <h1>Topics</h1><br>
    <div class="hr-line-div"><hr class="hr-line"></div><br>

    <div class="category-container">
        <?php
         $query = mysqli_query($con,"SELECT * FROM categories");
         while($row = mysqli_fetch_array($query)){
             $html_data = ' <div class="items"><a href="#">'.$row['categories_name'].'</a></div>';
             echo html_entity_decode($html_data);
         }

        ?>




    </div>

</div>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="handlers/javascript/main-js-files/onScrollNavBar.js"></script>
</body>
</html>
