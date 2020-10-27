$(function(){
    $('.sub_nav_outer ul li:first-child').click(function(){
        $(this).siblings('li').slideToggle();
    });
});