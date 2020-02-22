<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 2/12/2019
 * Time: 10:26 PM
 */

$search_engine_already_title = "";
$search_engine_already_description = "";
$search_engine_already_keywords = "";
$post_heading_already = "";
$post_already_category = "";
$post_already_text = "";
$title_image_already = "";

$post_editing_id = 0;

$successful_update= "update_data successfully";
$error_successful = array();


if(isset($_GET['id'])){
    $post_editing_id = $_GET['id'];


    $query = mysqli_query($con,"SELECT * FROM posts_data WHERE id='$post_editing_id'") or die(mysqli_error($con));
    $row =  mysqli_fetch_array($query);
    $search_engine_already_title = $row['search_engine_title'];
    $search_engine_already_description = $row['search_engine_description'];
    $search_engine_already_keywords = $row['search_engine_keyword'];
    $post_already_category = $row['category'];
    $post_already_text = $row['post_text'];
    $title_image_already = $row['title_image'];
    $post_heading_already = $row['post_heading'];



}


?>