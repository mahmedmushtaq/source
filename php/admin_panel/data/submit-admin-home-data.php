<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 2/7/2019
 * Time: 3:08 PM
 */

date_default_timezone_set("Asia/Karachi");
$date_time = Date_time::getNowTime();
$search_engine_title_error = "Words Must Be Less than 70 or not empty";
$search_engine_description_error = "Words Must Be Less than 400 , not empty";
$post_heading_error = "Words Must Be Less than 70 or not empty";
$post_text_error = "Your post must contain 400 words ";
$title_image_error = "Title image required";

$category_selected_error = "Please select a category";
$error_array = array();
$successful_echo = "Successfully data submit";
$title_is_already_present_echo = "This search engine title is already present please choose a different title";



if(isset($_POST['submit'])) {


    $post_text = mysqli_real_escape_string($con, htmlentities($_POST['text-area']));
    $search_engine_title = mysqli_real_escape_string($con, strip_tags($_POST['search_engine_title']));

    $search_engine_description = mysqli_real_escape_string($con, strip_tags($_POST['search_engine_description']));
    $search_engine_keyword = mysqli_real_escape_string($con, strip_tags($_POST['search_engine_keyword']));
    $post_heading = mysqli_real_escape_string($con, strip_tags($_POST['post_heading']));
    $category_name = mysqli_real_escape_string($con, strip_tags($_POST['selected_category']));
    $title_image_name = $_FILES['title_image']['name'];

    $posted_by = $_SESSION['admin_username'];
    $post_link = GeneralFunctions::cleanStringFromSpecialCharacters($search_engine_title);


    if ( strlen($search_engine_title) < 1 || strlen($search_engine_title) > 70 ) {
        array_push($error_array, $search_engine_title_error);

    } else if(strlen($category_name) < 2){
        array_push($error_array,$category_selected_error);
    } else if(strlen($post_text) < 400) {
        array_push($error_array,$post_text_error);

    }


    else if (strlen($post_heading) > 70 || strlen($post_heading) < 1) {
        array_push($error_array, $post_heading_error);

    } else if(strlen($search_engine_description) < 1 || strlen($search_engine_description) > 400) {
        array_push($error_array,$search_engine_description_error);

    }else if($title_image_name === ""){
        array_push($error_array,$title_image_error);
    }else{
        $file_save_dir = "kcfinder/upload/images/title_image/";
        $generated_name = uniqid().basename($title_image_name);
        $file_save_dir_name_with_image_name = $file_save_dir.$generated_name;
        if(move_uploaded_file($_FILES['title_image']['tmp_name'],$file_save_dir_name_with_image_name)){
            //path where image store  /source
            $image_path = "/php/file/kcfinder/upload/images/title_image/".$generated_name;

         //   $query_text = "INSERT INTO posts_data(search_engine_title,search_engine_description,search_engine_keyword,post_heading,category,post_text,title_image,posted_by,post_link,delete_post,date_time) VALUES ('$search_engine_title','$search_engine_description','$search_engine_keyword','$post_heading','$category_name','$post_text','$image_path','$posted_by','$post_link','no',$date_time)";

           //$query = mysqli_query($con,$query_text) or die(mysqli_error($con));
           // echo "inserted";

            //first check search_engine_title_already_present_or_not

            $query_check = mysqli_query($con,"SELECT id FROM posts_data WHERE search_engine_title='$search_engine_title'") or die(mysqli_error($con));


            if(mysqli_num_rows($query_check) === 0) {
               // $search_engine_title_without_special_character = GeneralFunctions::cleanStringFromSpecialCharacter($search_engine_title);
                $query = mysqli_query($con, "INSERT INTO posts_data(search_engine_title,search_engine_description,search_engine_keyword,post_heading,category,post_text,title_image,posted_by,post_link,delete_post,date_time) VALUES ('$search_engine_title','$search_engine_description','$search_engine_keyword','$post_heading','$category_name','$post_text','$image_path','$posted_by','$post_link','no','$date_time')");
                if ($query) {
                    array_push($error_array, $successful_echo);
                } else {
                    echo mysqli_error($con);
                }
            }else{
                    array_push($error_array,$title_is_already_present_echo);
            }



        }else{
            $title_image_error = "image transfer error .try again later";
            array_push($error_array,$title_image_error);
        }


    }
}

?>
