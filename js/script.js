// Se agrega jQuery de este modo para wordpress
jQuery(document).ready(function($){
    $('.main-header__button').on('click', function() {
        $('.hamburger-menu').toggleClass('animate');
        //$('nav').slideToggle();
        $('nav').animate({width:'toggle'},350);
    });

    $('.buscador__formulario').hide();
    $('.buscador__boton').on('click', function() {
        $('.buscador__formulario').slideToggle();
    });

    // Todas las funciones se ejecutan al cambiar el tamaño de la pantalla
    $(window).resize(function() {
        // This will fire each time the window is resized:
        if ($(window).width() >= 768) {
            // if larger or equal
            $('nav').show();
            $('.buscador__formulario').show();
            $('.buscador__boton').hide();
        } else {
            $('.buscador__boton').show();
            $('.buscador__formulario').hide();
        }
        // Cuando hacemos resize que tambien cambie el espacio del top del sitio
        var height1 = $('.main-header').height();
        var height2 = $('.top-header').height();
        $('body').css('margin-top',(height1 + height2) + 'px');

    }).resize();

});