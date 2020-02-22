
var $menu_image_a = $(".menu-img-a");

var $check_navbar_visibility = $(".navbar-ul");



$(window).resize(function () {
   if($(window).width() >= 769){
       $check_navbar_visibility.css({
           "display":"flex",
           "flex-direction":"row",
           "justify-content":"space-around"

       });
   }else{
       $check_navbar_visibility.css("display","none");
   }
});


$menu_image_a.click(function () {


 if($check_navbar_visibility.css("display") === "none"){
     $check_navbar_visibility.css({
         "display":"flex",
         "flex-direction":"column",
         "justify-content":"center"
     });
 }else{
     $check_navbar_visibility.css("display","none");
 }
});

