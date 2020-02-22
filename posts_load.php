<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/25/2019
 * Time: 5:55 PM
 */

//echo "value are ".$_GET['value'];
require "php_classes/connection.php";
require "php_classes/DateTime.php";
require "php_classes/GeneralFunctions.php";


$echo_array = array();
$empty_data_echo = "Sorry no data is found.Or url is incorrect please search again and found again this post";
$post_heading = "";
$category = "";
$post_text = "";
$posted_by = "";
$date_time = "";
$search_engine_title = "";
$search_engine_description = "";
$search_engine_keyword = "";

if(isset($_GET['value'])){
    $post_link = mysqli_real_escape_string($con,$_GET['value']);
    $query_get_data = mysqli_query($con,"SELECT * FROM posts_data WHERE post_link='$post_link' AND delete_post='no'");
    if(mysqli_num_rows($query_get_data) > 0){

        $row = mysqli_fetch_array($query_get_data);
        $post_heading = $row['post_heading'];
        $category = $row['category'];
        $post_text = $row['post_text'];
        $post_id = $row['id'];
        $date_time = Date_time::convertDateTime($row['date_time']);
        $username = $row['posted_by'];
        $search_engine_description = $row['search_engine_description'];
        $search_engine_keyword = $row['search_engine_keyword'];

        $search_engine_title_local = GeneralFunctions::cleanStringFromSpecialCharacters($row['search_engine_title']) ;
        $search_engine_title = str_replace("-"," ",$search_engine_title_local);

        $query = mysqli_query($con,"SELECT admin_name From admins WHERE admin_username='$username'");
        $row_for_admin = mysqli_fetch_array($query);
        $posted_by = $row_for_admin['admin_name'];


//        for trending posts
        trendingPost($con,$post_id);


    }else{
        array_push($echo_array,$empty_data_echo);
    }


}else{
    array_push($echo_array,$empty_data_echo);
    //header("refresh:3;url:index.php");
    //header("refresh:3;url=index");
}


function trendingPost($con,$post_id){
    $query_trending_posts = mysqli_query($con,"SELECT * From trending_posts WHERE post_id='$post_id'");
    if(mysqli_num_rows($query_trending_posts) > 0){

        $row_trending = mysqli_fetch_array($query_trending_posts);
        $no_of_times_visit = $row_trending['no_of_times_visit'];
        $no_of_times_visit++;
        mysqli_query($con,"UPDATE trending_posts SET no_of_times_visit='$no_of_times_visit' WHERE post_id='$post_id'") or die(mysqli_error($con));


    }else{
        mysqli_query($con,"INSERT INTO trending_posts(no_of_times_visit,post_id) VALUES (1,'$post_id')") or die(mysqli_error($con));
    }
}

?>

<html>
<head>
    <meta charset="UTF-8" content="width=device-width,initial-scale=1.0" name="viewport">
    <meta name="description" content="<?php echo $search_engine_description?>">
    <meta name="keyword" content="<?php echo $search_engine_keyword?>">
    <meta name="robots" content="index, follow">
    <title><?php echo $search_engine_title;?></title>
    <link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
    <link href="handlers/css/css_main/main_navbar.css" rel="stylesheet">
    <link href="handlers/css/css_main/posts_load.css" rel="stylesheet">



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

    <?php
    if(in_array($empty_data_echo,$echo_array)){
        echo html_entity_decode("<h1>".$empty_data_echo."</h1><br><br><a href='index'>Back to home Page</a><br><br>");
    }

    ?>

    <?php
    if($post_heading !== "") {


            $html_data = '
        <div class="content">
            <br><h1>'.$post_heading.'</h1><br><br>
             '.$post_text.'
            <br><br>
             <div class="general-info" style="display: flex;">
                 <div >posted by &nbsp; &nbsp; &nbsp;<h3 style="color: #2ecc71;">'.$posted_by.'</h3></div>&nbsp; &nbsp; &nbsp; | &nbsp; &nbsp;&nbsp;
                 <div >category &nbsp; &nbsp; &nbsp;<h3 style="color: #2980b9;">'.$category.'</h3></div>&nbsp; &nbsp; &nbsp;|&nbsp; &nbsp; &nbsp;
                 <div ">date time &nbsp; &nbsp; &nbsp;<h3 style="color: #1abc9c;">'.$date_time.'</h3 ></div>
             </div>
        </div>';

            echo html_entity_decode($html_data);


    }

?>
</div>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="handlers/javascript/main-js-files/onScrollNavBar.js"></script>
</body>
</html>
