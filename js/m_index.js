$(function(){

    $(".side_dep1").click(function(){
        // $(".side_dep1").removeClass('on');
        $(this).toggleClass('on');
        $(this).children('ul').slideToggle(500);
    });

    $('.ham_menu').click(function (e) { 
        $("#side_nav").animate({width:"toggle"},500)
        $("#side_bg").toggle();
    });
    
});