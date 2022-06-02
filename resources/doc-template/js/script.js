import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"

$(document).ready(function(){
    var elements = [];

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
    });

    window.addEventListener('save-brand-config', event => {
        Toastify({
            text: event.detail.message,
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
              background: "linear-gradient(180deg, rgba(0,208,101,1) 98%, rgba(109,255,104,1) 100%)",
            },
            onClick: function(){} // Callback after click
          }).showToast();
    });
});