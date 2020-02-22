<?php
require "../../php_classes/connection.php";
require "../../php_classes/check_login_session.php";

$title_images = array();
$ids  = array();
$search_engine_title = array();
$last_id = 0;
//$show_previous_btn = 0;//0 for not 1 for yes
$show_message = array();
$post_link = array();



if(isset($_GET['delete_id'])){
    $delete_id = mysqli_real_escape_string($con,$_GET['delete_id']);
    deletePost($delete_id,$con);

}


if(isset($_GET['last_id'])){


        $last_id_by_get = mysqli_real_escape_string($con,$_GET['last_id']);
        $query = mysqli_query($con, "SELECT * FROM posts_data WHERE id < $last_id_by_get AND delete_post='no' ORDER BY id DESC LIMIT 20") or die(mysqli_error($con));
        while ($row = mysqli_fetch_array($query)) {


            $title_images[] = $row['title_image'];
            $ids[] = $row['id'];
            $post_link[] = $row['post_link'];
            $last_id = $row['id'];
            $search_engine_title_local = $row['search_engine_title'];

            if (strlen($search_engine_title_local) > 20) {
                $search_engine_title[] = substr($search_engine_title_local, 0, 19) . "..";
            }else{

                $search_engine_title[] = $search_engine_title_local;
            }

        }


}else {

    //when page restarting

  //  $show_previous_btn = 0;

    $query = mysqli_query($con, "SELECT * FROM posts_data  WHERE delete_post='no' ORDER BY id DESC LIMIT 20");

    while($row = mysqli_fetch_array($query)) {

        $title_images[] = $row['title_image'];
        $ids[] = $row['id'];
        $last_id = $row['id'];

        $post_link[] = $row['post_link'];
        $search_engine_title_local = $row['search_engine_title'];
        if(strlen($search_engine_title_local) > 20){
            $search_engine_title[] = substr($search_engine_title_local,0,19)."..";
        }else{

            $search_engine_title[] = $search_engine_title_local;
        }

    }


}

function deletePost($id,$con){
    mysqli_query($con,"UPDATE posts_data SET delete_post='yes' WHERE id='$id'") or die(mysqli_error($con));

    header("Refresh:0; url=admin_posts.php");
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <!--    The spider will not look at this page but will crawl through the rest of the pages on your website.-->
    <meta name="robots" content="noindex, nofollow">
    <title>Admin posts</title>
    <script src="/source/handlers/javascript/admin-js-files/main-style-files/adminHeaderLinksFile.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="/source/handlers/css/admin_panel_stylesheets/admin_posts.css">




</head>
<body>

<script src="/source/handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>
<br><br><br><br>
<div class="content">

    <h1 style="text-align: center;margin-top: 20px;margin-bottom: 40px;">All posts</h1>

    <?php


      $search_bar = ' <div class="search-div">

        <div class="search-bar"><input type="text" class="search-bar-input" placeholder="Search your posts directly here"><img class="search-logo" style="padding: 22px;" src="../../handlers/assets/search.png"></div>

    </div>';

      echo html_entity_decode($search_bar);


      for($x = 0; $x < count($title_images);$x++){

            $html_data = '
        
        
        
        <br>
        
        <div class="post-container">
     
        
            <img src="/source'.$title_images[$x].'" class="post-image">
            <a href="/source/'.$post_link[$x].'" class="post-heading"> <h3 >'.$search_engine_title[$x].'</h3></a>
        
           
            <a href="admin_posts?delete_id='.$ids[$x].'" class="font"><i class="fas fa-trash-alt "></i></a>
            <a href="../file/admin_home?id='.$ids[$x].'" class="font"><i class="far fa-edit font"></i></a>
        
        
        </div>';



            echo html_entity_decode($html_data);



       }


// <a href="admin_posts.php?last_id=&delete_id='.$ids[$x].'" class="font"><i class="fas fa-trash-alt "></i></a>


    ?>





    <br><br>

  <?php
    $check_first_id_query = mysqli_query($con,"SELECT id FROM posts_data WHERE delete_post='no' ORDER BY id ASC LIMIT 1 ");
    $row_check = mysqli_fetch_array($check_first_id_query);
    $first_id = $row_check['id'];
    if($last_id > $first_id) {
       $html_data = '<a href="admin_posts?last_id='.$last_id.'">Next</a>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>';
       // $html_data = '<a href="admin_posts/last_id/'.$last_id.'">Next</a>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>';
        echo html_entity_decode($html_data);
    }



  ?>



</div>

<br><br><br><br><br><br>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/source/handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>


<script type="text/javascript">
    function pageRedirect(){
        window.location.replace("search_file");
    }
    $(".search-bar-input").focus(function () {
      setTimeout("pageRedirect()",1000);
    });
</script>

</body>
</html>

