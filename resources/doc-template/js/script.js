$(document).ready(function(){
    var elements = [];

    $(".scroll-to-link").click(function(e) { 
        e.preventDefault(); 
        var id = $(this).attr('data-target');
        $('html,body').animate({scrollTop: $("#"+id).offset().top - 20});
        return false;
    });
    
    function calculElements(){
        var total_height = 0;
        elements = [];
        $('.content-section').each(function(){
            var the_section = {};
            the_section.id = $(this).attr('id').replace('content-', '');
            total_height +=  $(this).height();
            the_section.max_height = total_height;
            elements.push(the_section);
        });
    }
    
    calculElements();
    $(window).resize(function(e){
        e.preventDefault(); 
        calculElements();
    });
    
    $(window).on('scroll', function(e) {
        e.preventDefault();
    });
});