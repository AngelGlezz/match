$(document).ready(function(){
    $(window).scroll( function(){
        /* Check the location of each desired element */
        $('.hidden').each(function(i){
            
            var bottom_of_object = ($(this).offset().top + $(this).outerHeight());
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                $(this).addClass('animated fadeInUp');
                $(this).removeClass('hidden'); 
            }
        }); 
    });

    $(".show").fancybox({
        'centerOnScroll': true,
        'padding': 0
    });

    $(".show-video").fancybox({
        'centerOnScroll': true,
        'padding': 0
    });

    $(".show-profile").fancybox({
        'centerOnScroll': true,
        'padding': 0
    });
});