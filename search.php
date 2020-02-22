<?php
/**
 * Created by PhpStorm.
 * User: M Ahmed Mushtaq
 * Date: 7/27/2019
 * Time: 3:40 PM
 */
?>

<html>
<head>
    <meta charset="UTF-8" content="width=device-width,initial-scale=1.0" name="viewport">
    <title>Search information,web technology and news related articles</title>
    <link href="https://fonts.googleapis.com/css?family=Sniglet&display=swap" rel="stylesheet">
    <link href="handlers/css/css_main/main_navbar.css" rel="stylesheet">
    <link href="handlers/css/css_main/search.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


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
    <h1>Search</h1><br>
    <div class="hr-line-div"><hr class="hr-line"></div><br>

    <div class="search-div">

        <div class="search-bar"><input type="text" placeholder="Search posts by Heading,by keyword and by description"><img class="search-logo" src="handlers/assets/search.png"></div>

    </div>

<!--    search result below-->

    <div class="all-posts-holder">
        <!-- here posts come-->
    </div>






</div>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script type="text/javascript" src="../handlers/javascript/main-js-files/onScrollNavBar.js"></script>-->

<script type="text/javascript">

    var searchInput = $(".search-bar input");
    searchInput.on('input',function () {
        $(".all-posts-holder").empty();
        var searchValue =  searchInput.val();
        if(searchValue !== "") {

            var searchUrl = "php/ajax_loader/search_result_by_ajax.php?value=" + searchValue;

            $.get({
                url: searchUrl,
                cache: "false",
                dataType: "text",
                success: function (data) {
                    console.log(data);
                    var jsonData = JSON.parse(data);
                    for (var x = 0; x < jsonData.posts_id.length; x++) {

                        appendData(jsonData.posts_image_array[x], jsonData.posts_heading_array[x], jsonData.posts_description[x], jsonData.posts_date_time[x],jsonData.post_link[x]);
                    }


                }
            });


        }else{
            $(".all-posts-holder").empty();
        }

    });



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
