import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"

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

    window.addEventListener('send-entry-error', event => {
        Toastify({
            text: event.detail.error,
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "linear-gradient(180deg, rgba(255,118,118,1) 96%, rgba(255,193,105,1) 100%)",
            },
            onClick: function(){} // Callback after click
          }).showToast();
        // alert(event.detail.error);
    });
});