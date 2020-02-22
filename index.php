<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/12/2019
 * Time: 11:27 PM
 */

require "php_classes/connection.php";
require "php_classes/DateTime.php";
require "php_classes/GeneralFunctions.php";

$posts_image_array = array();
$trending_image_array = array();
$posts_heading_array  = array();
$trending_heading_array  = array();
$posts_description = array();
$trending_description = array();
$posts_date_time = array();
$trending_date_time = array();
$posts_id = array();
$trending_id = array();
//$search_engine_title = array();
$post_link = array();
$trending_link = array();

$query = mysqli_query($con,"SELECT * FROM posts_data WHERE  delete_post='no' ORDER BY id DESC LIMIT 8") or die(mysqli_error($con));
while($row = mysqli_fetch_array($query)){
    $posts_image_array[] = $row['title_image'];

    if(strlen($row['post_heading']) > 15)
        $posts_heading_array[] = substr($row['post_heading'],0,15)."..";
    else
    $posts_heading_array[] = $row['post_heading'];


    if(strlen($row['search_engine_description']) > 100)
    $posts_description[] = substr($row['search_engine_description'],0,100)."....";
    else $posts_description[] = $row['search_engine_description'];


    $posts_id[] = $row['id'];
    $post_link[] = $row['post_link'];

    $posts_date_time[] = Date_time::convertDateTime($row['date_time']);

   // $search_engine_title[] = GeneralFunctions::cleanStringFromSpecialCharacter($row['search_engine_title']);//str_replace(" ","-",$row['search_engine_title']);





}

//select trending posts

$query_trending_posts = mysqli_query($con,"SELECT post_id FROM trending_posts ORDER BY no_of_times_visit DESC LIMIT 4") or die(mysqli_error($con));

while($row_trending = mysqli_fetch_array($query_trending_posts)) {
    $post_id = $row_trending['post_id'];
    $query = mysqli_query($con,"SELECT * FROM posts_data WHERE  delete_post='no' AND id='$post_id'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($query);
    $trending_image_array[] = $row['title_image'];

    if(strlen($row['post_heading']) > 15)
        $trending_heading_array[] = substr($row['post_heading'],0,15)."..";
    else
        $trending_heading_array[] = $row['post_heading'];


    if(strlen($row['search_engine_description']) > 100)
        $trending_description[] = substr($row['search_engine_description'],0,100)."..";
    else $trending_description[] = $row['search_engine_description'];


    $trending_id[] = $row['id'];
    $trending_link[] = $row['post_link'];

    $trending_date_time[] = Date_time::convertDateTime($row['date_time']);



}









if(isset($_POST['subscribe'])){
    $subscribe_email = mysqli_real_escape_string($con,$_POST['subscribe_email']);
    $date_time = Date_time::getNowTime();
    $query_check_email_already_present = mysqli_query($con,"SELECT user_email FROM users WHERE user_email='$subscribe_email'");

    if(mysqli_num_rows($query_check_email_already_present) === 0)
    mysqli_query($con,"INSERT INTO users(user_email,date_time) VALUES ('$subscribe_email','$date_time')") or die(mysqli_error($con));


}


?>

<html>
<head>
    <meta charset="UTF-8" content="width=device-width,initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow">
    <title>Web Technology,information and news related articles</title>
    <link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="handlers/css/css_main/home_main.css">

<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->
<!--   -->
    <link rel="icon" type="image/jpg" href="handlers/assets/source-logo2.jpg">



</head>
<body>


<script type="text/javascript" src="handlers/javascript/main-js-files/include_computer_navbar.js"></script>

<!-- =======================NAVBAR FOR LARGE DEVICES ENDS HERE =================================== -->

<div class="break-div"><br><br><br><br><br><br><br></div>
 <div class="main-body">
<br>

<!--     ========================================  LATEST POST  container    ============================== -->
   <div class="latest-posts-container">

       <h2 class="latest-posts-heading">Latest posts</h2>

       <div class="latest-posts">
           <div class="marquee" data-duplicated='true'>
<!--               here code of your latest posts -->
               <div class="marquee-holder">

                   <!--                   latest post 1 -->
                   <?php
                   for($x = 0; $x< sizeof($posts_id); $x++) {
                       if($x <=3) break;//only show 3 posts in marquee
                       $trending_data_marquee =  '<img class="latest-posts-img" src="/source'.$posts_image_array[$x].'">&nbsp;&nbsp;
              <p>'.$posts_heading_array[$x].'</p>&nbsp;&nbsp;&nbsp;&nbsp';
                       echo html_entity_decode($trending_data_marquee);

                   }


                   ?>




                   <!--                   latest post 2 -->



               </div>

<!--               marquee holder ends here-->
           </div>


       </div>


</div>
<!--     latest post container ends here -->

     <br><br>

<!--     <div class="search-div">-->
<!---->
<!--         <div class="search-bar"><input type="text" placeholder="Search posts"><img class="search-logo" src="../handlers/assets/search.png"></div>-->
<!---->
<!--     </div>-->





<!--      ================================================= TOP TRENDING POSTS HERE ==================================      -->
<br>
     <h2>Trending Posts</h2>

     <div class="trending-div-container">

             <div class="trending-div-holder">
           <div class="left-trending-div">
               <img src="<?php echo '/source'.$trending_image_array[0]; ?>" class="left-trending-image">
    <!--           trending post heading-->
            <span>
               <h2><?php echo $trending_heading_array[0]; ?></h2><br>

               <div class="read-more-and-date-holder">
                   <a href="<?php echo $trending_link[0]; ?>">read more</a>
                   <p><?php echo $trending_date_time[0]; ?></p>
               </div>
                </span>

           </div>

                 <div class="right-trending-div">

           <?php

           for($x = 1;$x < sizeof($trending_id);$x++) {

               $html_right_trending_data = '
             

                 <!--           first right post -->
                 <div class="right-post-container">
                     <img src="/source.'.$trending_image_array[$x].'" class="right-trending-image">
                     <span>
                         <h3>'.$trending_heading_array[$x].'</h3>
                         <p>'.$trending_description[$x].'
                             <a href="'.$trending_link[$x].'">read more</a></p>



    <!--           </div>-->
                     </span>
                
      </div>';

               echo html_entity_decode($html_right_trending_data);

           }

              ?>

                 </div>

             </div>





     </div>


     <!--   ========================= RECENT POSTS ==================   -->


     <div class="recent-post-container">
         <br><br><br>
         <h2  >Recent posts</h2>


         <div class="post-grid-container">

             <!--             ===================== POST 1      -->
             <?php

             for($x = 0; $x < sizeof($posts_id);$x++) {

                         $html_data = '
                     <div class="recent_post">
                         <img class="recent_post_img" src="/source'.$posts_image_array[$x]. '">
                         <div class="recent-post-txt-holder">
                             <h1>' .$posts_heading_array[$x].'</h1>
                             <p>'.$posts_description[$x].'<a href="'.$post_link[$x].'">  Read more</a> <b >'.$posts_date_time[$x].'</b></p>
                         </div>
        
                     </div>';

                         echo html_entity_decode($html_data);


             }


            ?>


         </div>


     </div><br>



     <br><br><br>

     <a href="all_posts"  >More Recent Posts</a><br><br><br><br><br><br>



</div>

<div class="subscription-div">
    <form method="post" action="index.php">
    <input type="text" placeholder="stay alert by subscribing it with your email"  name="subscribe_email">
    <button type="submit"  name="subscribe">Subscribe</button>
    </form>
</div>


<div class="bottom">
    <div class="bottom-container"><br>

    <h2>Share It</h2><br>
        <hr><br>
        <div class="bottom-container-logo">
            <a href="#"><img class="share_it" src="handlers/assets/facebook.png"></a>
            <a href="#"> <img class="share_it" src="handlers/assets/instagram.png"></a>
            <a href="#"><img class="share_it" src="handlers/assets/twitter.png"></a>
        </div>
    </div>
</div>



<!-- <br><br><br><br><br>-->










<!-- ============================================= NAVBAR FOR SMALL DEVICES STARTS HERE ====================================== -->


<script type="text/javascript" src="handlers/javascript/main-js-files/include_mobile_navbar.js"></script>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="handlers/javascript/main-js-files/onScrollNavBar.js"></script>
<script type='text/javascript' src='//cdn.jsdelivr.net/jquery.marquee/1.3.1/jquery.marquee.min.js'></script>
 <script type="text/javascript">
     var marqueeSelector = $(".marquee");
     var widthLatestPostContainer = $(".latest-posts-container").width()-200;
     marqueeSelector.css("width",widthLatestPostContainer);

     //proporcional speed counter (for responsive/fluid use)

     var widths = marqueeSelector.width();
     var duration = widths * 17;

     marqueeSelector.marquee({
         //speed in milliseconds of the marquee
         duration: duration, // for responsive/fluid use
         //duration: 8000, // for fixed container
         //gap in pixels between the tickers
         gap: marqueeSelector.width(),
         //time in milliseconds before the marquee will start animating
         delayBeforeStart: 0,
         //'left' or 'right'
         direction: 'left',
         //true or false - should the marquee be duplicated to show an effect of continues flow
         duplicated: true
     });


//     for left span div


     var leftTrendingDiv = $(".left-trending-div");
     var leftTrendingDivSpan = $(".left-trending-div span");

    leftTrendingDivSpan.css("width",leftTrendingDiv.width());//this is for overlay(above) span which show on left trending div



 </script>


</body>


</html>
