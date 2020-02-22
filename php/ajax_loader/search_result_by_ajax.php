<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/31/2019
 * Time: 5:15 PM
 */

require "../../php_classes/connection.php";
require "../../php_classes/DateTime.php";

$posts_image_array = array();
$posts_heading_array  = array();
$posts_description = array();
$posts_date_time = array();
$posts_id = array();
$post_link = array();
$search_result = strtolower(mysqli_real_escape_string($con,$_GET['value']));

$query = mysqli_query($con, "SELECT * FROM posts_data WHERE (id LIKE '%$search_result%' OR search_engine_title LIKE '%$search_result%' OR search_engine_keyword LIKE '%$search_result%' OR search_engine_description LIKE '%$search_result%' OR post_heading LIKE '%$search_result%') AND delete_post='no'  ORDER BY id DESC") or die(mysqli_error($con));

while($row = mysqli_fetch_array($query)){
    $posts_image_array[] = '/source'.$row['title_image'];
    $posts_heading_array[] = $row['post_heading'];

    if(strlen($row['search_engine_description']) > 120)
        $posts_description[] = substr($row['search_engine_description'],0,120)."..";
    else $posts_description[] = $row['search_engine_description'];


    $posts_id[] = $row['id'];

    $posts_date_time[] = Date_time::convertDateTime($row['date_time']);
    $post_link[] = $row['post_link'];
}

echo json_encode(array(
    "result"=>"successful",
    "posts_image_array" => $posts_image_array,
    "posts_heading_array" => $posts_heading_array,
    "posts_description" => $posts_description,
    "posts_date_time" => $posts_date_time,
    "posts_id" => $posts_id,
    "post_link" => $post_link
));





?>
