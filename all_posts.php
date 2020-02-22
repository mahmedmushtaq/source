<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/12/2019
 * Time: 11:27 PM
 */




?>

<html>
<head>
    <meta charset="UTF-8" content="width=device-width,initial-scale=1.0" name="viewport">
    <meta name="robots" content="index, follow">
    <title>All posts about information,web technology and news</title>
    <link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
    <link href="handlers/css/css_main/main_navbar.css" rel="stylesheet">
    <link href="handlers/css/css_main/all_posts.css" rel="stylesheet">


<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">-->
<!--   -->
    <link rel="icon" type="image/jpg" href="handlers/assets/source-logo2.jpg">



</head>
<body>
<!--   ================================================  NAV-BAR ==========================================     -->

<script type="text/javascript" src="handlers/javascript/main-js-files/include_computer_navbar.js"></script>
<script type="text/javascript" src="handlers/javascript/main-js-files/include_mobile_navbar.js"></script>


<!--   ================================================== MAIN-BODY ========================================    -->
<div class="break-div"><br><br><br><br><br><br><br><br></div>

<div class="main-body">
    <br>
    <h1>All Posts</h1><br>
    <div class="hr-line-div"><hr class="hr-line"></div><br>

   <div class="all-posts-holder">
<!-- here posts come-->
   </div>
<!---->
    <div class="load-more-div"><b style="color: dodgerblue;cursor: pointer;" onclick="loadMoreFunc()">Load More</b></div>




</div>

<br><br><br><br><br><br><br><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="handlers/javascript/main-js-files/onScrollNavBar.js"></script>
<script type="text/javascript">
//for ajax

var last_id = 0;

$(window).scroll(function () {
//    if($(window).scrollTop >= $(document).height()-$(window).height()-100){
//        alert("near bottom");
//    }

//    if($(window).scrollTop() + $(window).height() > $(document).height()-100) {
//         loadDataByAjax(last_id);
//    }

});

function loadMoreFunc() {
    if(last_id > 0)
    loadDataByAjax(last_id);
}



$(window).on('load',function() {
    // executes when complete page is fully loaded, including all frames, objects and images

    loadDataByAjax(0);
});

function loadDataByAjax(lastId) {
      var postsUrl = "php/ajax_loader/load_all_posts_by_ajax.php?last_id="+lastId;

    $.get({
        url:postsUrl,
        cache:false,
        dataType:"text",
        success:function (data) {

            var jsonData = JSON.parse(data);
            var result = jsonData.result;
            if(result === "successful") {
                for (var x = 0; x < jsonData.posts_id.length; x++) {
                    last_id = jsonData.posts_id[x];
                    appendData(jsonData.posts_image_array[x], jsonData.posts_heading_array[x], jsonData.posts_description[x], jsonData.posts_date_time[x],jsonData.post_link[x]);
                }
            }else{

                $(".load-more-div b").text("no more data is found");
            }


        }
    });



}






function appendData(imgSrc, postHeading,description,date,post_link) {


    $(".all-posts-holder").append('<div class="post_container">'+
        '<img class="post_container_img" src="'+imgSrc+'">'+
        '<div class="content_holder">'+
        '<h2>'+postHeading+'</h2>'+
        '<p>'+description+'<a href="'+post_link+'">  Read More</a> </p><br>'+
        ' <p class="bold-date">'+date+'</p>'+
        '</div></div>');

 }


</script>

</body>
</html>
