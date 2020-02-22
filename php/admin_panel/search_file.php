<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 2/15/2019
 * Time: 3:02 PM
 */

require "../../php_classes/connection.php";
require "../../php_classes/check_login_session.php";

$title_images = array();
$ids  = array();
$search_engine_title = array();
$last_id = 0;
$show_previous_btn = 0;//0 for not 1 for yes
$show_message = array();

if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    deletePost($delete_id,$con);
}

if(isset($_GET['name'])){



        $search_name = $_GET['name'];
        $query = mysqli_query($con, "SELECT * FROM posts_data WHERE (id LIKE '%$search_name%' OR search_engine_title LIKE '%$search_name%' OR post_heading LIKE '%$search_name%' OR category LIKE '%$search_name%' OR post_heading LIKE '%$search_name%') AND delete_post='no' ORDER BY id DESC LIMIT 20") or die(mysqli_error($con));
        while ($row = mysqli_fetch_array($query)) {


            $title_images[] = $row['title_image'];
            $ids[] = $row['id'];
            $last_id = $row['id'];
            $search_engine_title_local = $row['search_engine_title'];

            if (strlen($search_engine_title_local) > 20) {
                $search_engine_title[] = substr($search_engine_title_local, 0, 19) . "..";
            }else{

                $search_engine_title[] = $search_engine_title_local;
            }

        }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin posts</title>
    <script src="../../handlers/javascript/admin-js-files/main-style-files/adminHeaderLinksFile.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/admin_posts.css">


</head>
<body>

<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>
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
            
            <a href="" class="post-heading"> <h3 >'.$search_engine_title[$x].'</h3></a>
        
            <a href="admin_posts.php?last_id=&delete_id='.$ids[$x].'" class="font"><i class="fas fa-trash-alt "></i></a>
            <a href="../file/admin_home.php?id='.$ids[$x].'" class="font"><i class="far fa-edit font"></i></a>
        
        
        </div>';




        echo html_entity_decode($html_data);



    }



    ?>





    <br><br>




</div>

<br><br><br><br><br><br>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>
<script src="../../handlers/javascript/admin-js-files/search_file.js"></script>
</body>
</html>
