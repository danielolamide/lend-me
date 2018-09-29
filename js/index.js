$(document).ready(function () {
    $(".dropdown-trigger").dropdown({
        coverTrigger: false,
        hover: true,
        constrainWidth: false
    });
    $('.sidenav').sidenav();
    // $(window).scroll(function(){
    //     if($(window).scrollTop()>100){
    //         $('nav').addClass('sticky-nav')
    //     }
    // });
    $('.pushpin').pushpin();
    $(document).ready(function () {
        $('.tabs').tabs({
            // swipeable:true
        });
    });
    $('.collapsible').collapsible();
    $('.modal').modal();

});