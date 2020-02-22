<?php

require "../../php_classes/connection.php";
require "../../php_classes/DateTime.php";
require "../../php_classes/check_login_session.php";
require "../../php_classes/GeneralFunctions.php";





//here already stand for value is present in database and we need to update value




require "../admin_panel/data/submit-admin-home-data.php";

require "../admin_panel/data/home_get_data_for_update.php";









?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1.0">
<!--    The spider will not look at this page but will crawl through the rest of the pages on your website.-->
    <meta name="robots" content="noindex, nofollow">
    <title>Home page</title>
    <link rel="stylesheet" href="/source/handlers/css/admin_panel_stylesheets/admin_home.css">
    <link rel="stylesheet" href="/source/handlers/css/navBar.css">
    <script type="text/javascript">

        document.write(" <link rel='stylesheet' href='/source/handlers/css/navBar.css'>\n" +
            "<link href=\"https://fonts.googleapis.com/css?family=Poppins\" rel=\"stylesheet\">"
        );

    </script>



    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>


</head>
<body>
<script type="text/javascript">

    document.write("<div class=\"navbar\">\n" +
        "\n" +
        "   <div class=\"navbar-dots-div\">\n" +
        "       <h3 class='small_devices_text'>Source</h3>\n" +
        "       <a href=\"#\" class=\"menu-img-a\">\n" +
        "           <img src=\"/source/handlers/assets/menu.png\" class=\"menu-img\"></a>\n" +
        "\n" +
        "   </div>\n" +
        "\n" +
        "    <ul class=\"navbar-ul\">\n" +
        "\n" +
        "        <li><a href=\"admin_home\">Home</a></li>\n"+
        "        <li><a href=\"/source/php/admin_panel/notifications\">Notifications</a></li>\n" +
        "        <li><a href=\"/source/php/admin_panel/admin_posts\">Posts</a></li>\n" +
        "        <li><a href=\"/source/php/admin_panel/users\">Users</a></li>\n" +
        "        <li class=\"last-navbar-item\"><a href=\"/source/php/admin_panel/settings\">Settings</a></li>\n" +
        "    </ul>\n" +
        "\n" +
        "</div>");
</script>

<br><br><br>

<div class="content">

<h1 class="welcome-heading">Welcome <?php echo $_SESSION['admin_name'];?></h1>
<div class="hr-line-div"><hr class="hr-line"></div>

    <?php

    $form = '<form  method="post" action="admin_home.php" enctype="multipart/form-data">';
    if($post_editing_id > 0){
        $form = '<form  method="post" action="/source/php/admin_panel/update_post/'.$post_editing_id.'" enctype="multipart/form-data">';
    }

    echo html_entity_decode($form);




//<!--   =======================================   SEARCH ENGINE TITLE     =================================  -->






    $search_engine_title_input = ' <input name="search_engine_title" type="text" placeholder="Search engine title (between 50 to 60 words)">';
     if($post_editing_id > 0){
         $search_engine_title_input = ' <input name="search_engine_title" type="text" placeholder="Search engine title (between 50 to 60 words)" value="'.$search_engine_already_title.'">';

     }
     echo html_entity_decode($search_engine_title_input);

        if(in_array($search_engine_title_error,$error_array)){
            echo "<br>".$search_engine_title_error."<br>";
        }else if(in_array($title_is_already_present_echo,$error_array)){
            echo "<br>".$title_is_already_present_echo."<br>";
        }

        ?>




<!--     =================================== SEARCH ENGINE DESCRIPTION ====================================== -->




    <?php
//


   $search_engine_description_input = ' <textarea name="search_engine_description" class="text-area"  placeholder="Enter your search engine description here (150 words or less)"></textarea>';
    if($post_editing_id > 0){
        $search_engine_description_input = ' <textarea name="search_engine_description" class="text-area"  placeholder="Enter your search engine description here (150 words or less)" >'.$search_engine_already_description.'</textarea>';

    }

    echo html_entity_decode($search_engine_description_input);

    if(in_array($search_engine_description_error,$error_array)){
        echo "<br>".$search_engine_description_error."<br>";
    }


     ?>





<!--     ========================================== SEARCH ENGINE KEYWORD =================================== -->




    <?php

    $search_engine_keyword_input = '<input name="search_engine_keyword" type="text" placeholder="Search engine keywords(Separating by comma)">';
    if($post_editing_id > 0){
        $search_engine_keyword_input = '<input name="search_engine_keyword" type="text" placeholder="Search engine keywords(Separating by comma)" value="'.$search_engine_already_keywords.'">';

    }

    echo html_entity_decode($search_engine_keyword_input);


   ?>



<!--     ====================================== POST HEADING ==============================================  -->



    <?php

       $post_heading_input = ' <input name="post_heading" type="text" placeholder="Your post heading (between 50 to 60 words)" >';
       if($post_editing_id > 0){
           $post_heading_input = ' <input name="post_heading" type="text" placeholder="Your post heading (between 50 to 60 words)" value="'.$post_heading_already.'">';
       }

       echo html_entity_decode($post_heading_input);


        if(in_array($post_heading_error,$error_array)){
            echo "<br>".$post_heading_error."<br>";
        }

        ?>


    <br><br>



    <!--     ====================================== SELECT CATEGORY ==============================================  -->
<!-- $select_input = ' <select class="select" name="selected_category">
            <option value="News">News</option>
            <option value="Technology" >Technology</option>
            <option value="Web designing" >Web designing</option>
            <option value="Article">Article</option>
        </select>';-->





   <select class="select" name="selected_category">
       <?php
    $query_get_all_categories_name = mysqli_query($con,"SELECT * FROM categories");
       $categories_name_array = array();
       while($row_category = mysqli_fetch_array($query_get_all_categories_name)){
          $categories_name_array[] = $row_category['categories_name'];

       }
       foreach ($categories_name_array as $category_name){

         if($post_editing_id > 0) {

             if ($post_already_category === $category_name) {

                 $option_value = '<option value="' . $category_name . '" selected>' . $category_name . '</option>';
                 echo  html_entity_decode($option_value);
             }else{
                 $option_value = '<option value="' . $category_name . '" >' . $category_name . '</option>';
                 echo  html_entity_decode($option_value);
             }
         }else{
             $option_value = '<option value="' . $category_name . '" >' . $category_name . '</option>';
             echo  html_entity_decode($option_value);
         }
// else {
//                 $option_value = '<option value="' . $category_name . '">' . $category_name . '</option>';
//             }
//   }
//    else{
//
//             $option_value = '<option value="' . $category_name . '">' . $category_name . '</option>';
//         }




       }


       ?>

    </select>


<!--//       if($post_editing_id > 0){-->
<!--//           $select_input = '-->
<!--//           <select class="select" name="selected_category">-->
<!--//            <option value="News">News</option>-->
<!--//            <option value="Technology" >Technology</option>-->
<!--//            <option value="Web designing" >Web designing</option>-->
<!--//            <option value="Article">Article</option>-->
<!--//        </select>-->
<!--//-->
<!--//           <br><br>-->
<!--//           <input name="selected_category_name"  type="text" value="'.$post_already_category.'" >';-->
<!--//       }-->
<?php


         if(in_array($category_selected_error,$error_array)){
             echo "<br>".$category_selected_error."<br>";
         }



 ?>

    <br><br>




    <!--     ====================================== SELECT TITLE IMAGE  ==============================================  -->





    <?php

           $select_image_title_input=' <div style="display:flex; background:white;padding-left:30px;padding-right: 30px; width: 82%;margin: auto;">
        
                <p style="align-self: center; width: 200px;">Choose your title Image</p>
                <input name="title_image" style="align-self: center;margin-bottom: 15px;" type="file" value="File" placeholder="Choose your title image">
              </div>
              
            ';

           if($post_editing_id > 0){
               $select_image_title_input=' <div style="display:flex; overflow: hidden; background:white;padding-left:30px;padding-right: 30px; width: 82%;margin: auto;">
        
                <p style="align-self: center; width: 200px;">Choose your title Image</p>
                <input name="title_image" style="align-self: center;margin-bottom: 15px;" type="file" value="File" placeholder="Choose your title image">
                <p style="align-self: center; width: 200px;">'.$title_image_already.'</p> 
              </div>
              
            ';

           }

           echo html_entity_decode($select_image_title_input);



            if(in_array($title_image_error,$error_array)){
                echo "<br>".$title_image_error."<br>";
            }

    ?>
    <br><br>




    <!--     ====================================== POST TEXT   ==============================================  -->





    <?php



            $post_text_input = '<textarea name="text-area" class="text-area" placeholder="Write your post here"></textarea>';
            if($post_editing_id > 0){
                $post_text_input = '   <textarea name="text-area" class="text-area" placeholder="Write your post here">'.$post_already_text.'</textarea>';
            }

            echo html_entity_decode($post_text_input);

            if(in_array($post_text_error,$error_array)){
                echo "<br>".$post_text_error."<br>";
            }

    ?>


    <br><br>
    <?php

   $submit_btn = '<input name="submit" type="submit" value="submit" class="btn submit"> <br><br>';
    $send_change_id = '<input name="post_editing_id" type="text" value="Editing id is = '.$post_editing_id.'" style="display: none;" disabled>';

    if($post_editing_id > 0) {
//       this input is only for id
//  $send_change_id = '<input name="post_editing_id" type="text" value="'.$post_editing_id.'"  readonly="true">';


//Editing id is =


       $submit_btn = '<input name="update" type="submit" value="update" class="btn submit"> <br><br>';

   }

    echo html_entity_decode($send_change_id)."<br><br>";

   echo html_entity_decode($submit_btn);


    if(in_array($successful_echo,$error_array)){
        echo "<br>".$successful_echo."<br>";
    }



    ?>





</form>



    <br><br>

    <script  type="text/javascript">
        CKEDITOR.replace('text-area');

 </script>






</div>

<br><br><br><br>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/source/handlers/javascript/navBar.js" ></script>


</body>
</html>

<?php


?>