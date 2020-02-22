<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 2/13/2019
 * Time: 2:59 PM
 */
require "../../php_classes/connection.php";
require "../../php_classes/check_login_session.php";
require "../../php_classes/GeneralFunctions.php";



//$error_array = array();
//$successful_echo = "Data is updated successfully";
//
//require "data/update_post_data.php";

if(isset($_POST['update'])) {


    $post_text = mysqli_real_escape_string($con, htmlentities($_POST['text-area']));
    $search_engine_title = mysqli_real_escape_string($con, strip_tags($_POST['search_engine_title']));

    $search_engine_description = mysqli_real_escape_string($con, strip_tags($_POST['search_engine_description']));
    $search_engine_keyword = mysqli_real_escape_string($con, strip_tags($_POST['search_engine_keyword']));
    $post_heading = mysqli_real_escape_string($con, strip_tags($_POST['post_heading']));
    $category_name = mysqli_real_escape_string($con, strip_tags($_POST['selected_category']));

    $title_image_name = $_FILES['title_image']['name'];

    $successful_echo = "update_data_successfully";
  //  $search_engine_title_without_special_characters = GeneralFunctions::cleanStringFromSpecialCharacter($search_engine_title);


    $post_editing_id = $_GET['id'];


    if ($title_image_name !== "") {
        $file_save_dir = "kcfinder/upload/images/title_image/";
        $generated_name = uniqid() . basename($title_image_name);
        $file_save_dir_name_with_image_name = $file_save_dir . $generated_name;
        if (move_uploaded_file($_FILES['title_image']['tmp_name'], $file_save_dir_name_with_image_name)) {
            //path where image store
            $image_path = "/source/php/admin_panel/kcfinder/upload/images/title_image/" . $generated_name;


           updateAllValue($con,$search_engine_title,$search_engine_description,$search_engine_keyword,$post_heading,$category_name,$post_text,$image_path,$post_editing_id);


        } else {
            //image transfer error
            echo "Image transfer error";


        }
    }else {
    //image name is  empty
        updateAllValueExceptTitleImage($con,$search_engine_title,$search_engine_description,$search_engine_keyword,$post_heading,$category_name,$post_text,$post_editing_id);


    }
}

function updateAllValue($con,$search_engine_title,$search_engine_description,$search_engine_keyword,$post_heading,$category_name,$post_text,$image_path,$id){
    //<> represent not equal to
    $query_check_search_engine_title_already_present_or_not = mysqli_query($con,"SELECT id FROM posts_data WHERE search_engine_title='$search_engine_title' AND id != $id") or die(mysqli_error($con));
    if(mysqli_num_rows($query_check_search_engine_title_already_present_or_not) === 0) {

        $post_link = GeneralFunctions::cleanStringFromSpecialCharacters($search_engine_title);

        $query_text = mysqli_query($con, "UPDATE posts_data SET post_link='$post_link', search_engine_title='$search_engine_title',search_engine_description='$search_engine_description',search_engine_keyword='$search_engine_keyword',post_heading='$post_heading',category='$category_name',post_text='$post_text' , title_image='$image_path' WHERE id='$id'") or die(mysqli_error($con));
        echo "Data Successfully updated";
        header("refresh:3;url=/source/php/file/admin_home");
    }else{
        echo "Data cannot be updated because search_engine_title is already present in another post (with image func)".mysqli_error($con);
    }

}

function updateAllValueExceptTitleImage($con,$search_engine_title,$search_egnine_description,$search_egnine_keyword,$post_heading,$category_name,$post_text,$id){

    $query_check_search_engine_title_already_present_or_not = mysqli_query($con,"SELECT id FROM posts_data WHERE search_engine_title='$search_engine_title' AND id != $id") or die(mysqli_error($con));
    if(mysqli_num_rows($query_check_search_engine_title_already_present_or_not) === 0) {

    $post_link = GeneralFunctions::cleanStringFromSpecialCharacters($search_engine_title);


    $query_text = mysqli_query($con,"UPDATE posts_data SET post_link='$post_link', search_engine_title='$search_engine_title',search_engine_description='$search_egnine_description',search_engine_keyword='$search_egnine_keyword',post_heading='$post_heading',category='$category_name',post_text='$post_text' WHERE id=$id") or die(mysqli_error($con));
    echo "Data Successfully updated";
    header("refresh:3;url=/source/php/file/admin_home");
    }else{
        echo "Data cannot be updated because search_engine_title is already present in another post".mysqli_error($con);
    }

}


//function updateAllValueExceptCategoryName($con,$search_engine_title,$search_engine_description,$search_engine_keyword,$post_heading,$post_text,$image_path,$id){
//    $query_text = mysqli_query($con,"UPDATE posts_data SET search_engine_title='$search_engine_title',search_engine_description='$search_engine_description',search_engine_keyword='$search_engine_keyword',post_heading='$post_heading',post_text='$post_text' , title_image='$image_path' WHERE id='$id'") or die(mysqli_error($con));
//    echo "Data Successfully updated";
//}
//
//function updateAllValueExceptCategoryNameAndTitleImage($con,$search_engine_title,$search_engine_description,$search_engine_keyword,$post_heading,$post_text,$id){
//    $query_text = mysqli_query($con,"UPDATE posts_data SET search_engine_title='$search_engine_title',search_engine_description='$search_engine_description',search_engine_keyword='$search_engine_keyword',post_heading='$post_heading',post_text='$post_text'  WHERE id='$id'") or die(mysqli_error($con));
//    echo "Data Successfully updated";
//}


