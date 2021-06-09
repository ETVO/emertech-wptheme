import "./partials/header.js";

import AOS from "aos";

AOS.init({
    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: -100, // offset (in px) from the original trigger point
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: true, // whether animation should happen only once - while scrolling down
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
});

jQuery(document).ready(function ($) {
    $(function(){
        $('.dropdown').hover(function() {
            $(this).addClass('show');
            $(this).find('.dropdown-menu').addClass('show');
        },
        function() {
            $(this).removeClass('show');
            $(this).find('.dropdown-menu').removeClass('show');
        });
    });


    // Add icons classes to each class
    // $('.eb-link').each(function () {

    //     if(!$(this).hasClass("no-ico")) 
    //         $(this).addClass("bi");
    //     else 
    //         return;

    //     var $isRight = $(this).hasClass("right");
    //     var $isLeft = $(this).hasClass("left");
    //     var $isUp = $(this).hasClass("up");
    //     var $isDown = $(this).hasClass("down");

    //     var direction = ($isRight) ? "right" : 
    //     ($isLeft) ? "left" : 
    //     ($isDown) ? "down" :
    //     ($isUp) ? "up" : "right"; 

    //     var className = "bi-arrow-";
    //     className += direction;
        
    //     $(this).addClass(className);
    // });
});