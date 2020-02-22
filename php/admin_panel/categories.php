<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 2/16/2019
 * Time: 9:41 PM
 */
require "../../php_classes/connection.php";
require "../../php_classes/check_login_session.php";
$error_array = array();
$categories_name_error = "Name is  not empty and not greater than 15 character";
if(isset($_GET['categories_name'])){
    $name = mysqli_real_escape_string($con,strip_tags($_GET['categories_name']));
    if(strlen($name) > 15 || strlen($name) < 1){
        array_push($error_array,$categories_name_error);
    }else{
        $query = mysqli_query($con,"INSERT INTO categories(categories_name) VALUES ('$name')") or die(mysqli_error($con));
        if($query){
            header("refresh: 1; url=categories");
        }
    }
}

if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $query_delete = mysqli_query($con,"DELETE FROM categories WHERE id='$delete_id'") or die(mysqli_error($con));
    if($query_delete){
        header("refresh: 1; url=categories");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
    <!--    The spider will not look at this page but will crawl through the rest of the pages on your website.-->
    <meta name="robots" content="noindex, nofollow">
    <title>Categories</title>
    <script src="../../handlers/javascript/admin-js-files/main-style-files/adminHeaderLinksFile.js"></script>
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/align_content_center_style_sheet.css">
    <link rel="stylesheet" href="../../handlers/css/admin_panel_stylesheets/categories_admin_home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>
<body>

<script src="../../handlers/javascript/admin-js-files/main-style-files/includeAdminNavBar.js"></script>
<br><br><br>


<div class="content">


    <h1 class="heading">Categories</h1>
    <div class="hr-line-div"><hr class="hr-line"></div>
    <div class="add-categories-input"><input type="text" name="new_category_name" class="new_category_name_class" placeholder="Add new category name"></div>
    <?php
    if(in_array($categories_name_error,$error_array)){
        echo $categories_name_error;
    }

    ?>
    <br>

<!--    <div class="holder">-->
<!--        <h3><a href="categories.php"> News </a> &nbsp;<a href=""><i class="fas fa-times"></i></a></h3>-->
<!---->
<!--    </div>-->

    <?php
    $query_get_category_name = mysqli_query($con,"SELECT * FROM categories") or die(mysqli_error($con));
    while($row = mysqli_fetch_array($query_get_category_name)){
      $data_html =    '<div class="holder">
        <h3><a href="categories.php">'.$row['categories_name'].'</a> &nbsp;<a href="categories?delete_id='.$row['id'].'"><i class="fas fa-times"></i></a></h3>

    </div>';
        echo html_entity_decode($data_html);
    }


    ?>

</div>




<br><br><br><br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../handlers/javascript/admin-js-files/main-style-files/adminBottomLinksFile.js"></script>
 <script type="text/javascript">

     $(".new_category_name_class").change(function () {
         window.location.replace("categories" +"?categories_name="+$(this).val());
     })
 </script>

</body>
</html>
