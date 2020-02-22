<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/30/2019
 * Time: 3:41 PM
 */

require "../../php_classes/connection.php";
require "../../php_classes/DateTime.php";

$posts_image_array = array();
$posts_heading_array  = array();
$posts_description = array();
$posts_date_time = array();
$posts_id = array();
$post_link = array();

$query = "";

$search_engine_title = array();

if($_GET['last_id'] > 0  ) {
    $last_id = $_GET['last_id'];

    $query = mysqli_query($con, "SELECT * FROM posts_data WHERE id < $last_id AND delete_post='no' ORDER BY id DESC LIMIT 10") or die(mysqli_error($con));


}else {
    // for first time load posts

    $query = mysqli_query($con, "SELECT * FROM posts_data WHERE  delete_post='no' ORDER BY id DESC LIMIT 10") or die(mysqli_error($con));
}
while($row = mysqli_fetch_array($query)){
    $posts_image_array[] = '/source'.$row['title_image'];
    $posts_heading_array[] = $row['post_heading'];

    if(strlen($row['search_engine_description']) > 170)
        $posts_description[] = substr($row['search_engine_description'],0,170)."..";
    else $posts_description[] = $row['search_engine_description'];


    $posts_id[] = $row['id'];

    $posts_date_time[] = Date_time::convertDateTime($row['date_time']);
    $search_engine_title[] = $row['search_engine_title'];
    $post_link[] = $row['post_link'];
}

if(sizeof($posts_id) > 0) {
    echo json_encode(array(
        "result"=>"successful",
        "posts_image_array" => $posts_image_array,
        "posts_heading_array" => $posts_heading_array,
        "posts_description" => $posts_description,
        "posts_date_time" => $posts_date_time,
        "posts_id" => $posts_id,
        "search_engine_title"=>$search_engine_title,
        "post_link"=>$post_link
    ));
}else{
    echo json_encode(array("result"=>"empty"));
}




?>