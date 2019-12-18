$('.main-header__button').on('click', function() {
    $('.hamburger-menu').toggleClass('animate');
    //$('nav').slideToggle();
    $('nav').animate({width:'toggle'},350);
});

$('.buscador__formulario').hide();
$('.buscador__boton').on('click', function() {
    $('.buscador__formulario').slideToggle();
});

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
}).resize();