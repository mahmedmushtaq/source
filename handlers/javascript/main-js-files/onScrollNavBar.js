/**
 * Created by M Ahmed Mushtaq on 7/14/2019.
 */

var navBarLogoSelector = $(".navbar-logo");
var navBarIcon = $(".navbar-icon");


$(function () {
    navBarLogoSelector.data("size","large");
});
var scroll = 0;
$(window).scroll(function () {
    scroll = $(window).scrollTop();
    if(scroll > 100){

        if(navBarLogoSelector.data("size") === "large") {

            navBarLogoSelector.animate({width: "60px"}, 600);
            $("ul li a").animate({
                fontSize:"1.2em"
            },600);

            navBarIcon.animate({
               width:"20px"
            },600);




            navBarLogoSelector.data("size","small");
        }

    }else{
        if(navBarLogoSelector.data("size") === "small"){
            navBarLogoSelector.animate({
                width: "80px"
            },600);
            $("ul li a").animate({
                fontSize:"1.5em"


            },600);

            navBarIcon.animate({
                width:"30px"
            },600);

            navBarLogoSelector.data("size","large");
        }
    }
});





