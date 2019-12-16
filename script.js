$('.main-header__button').on('click', function() {
    $('.hamburger-menu').toggleClass('animate');
    //$('nav').slideToggle();
    $('nav').animate({width:'toggle'},350);
});

$(window).resize(function() {
    // This will fire each time the window is resized:
    if ($(window).width() >= 768) {
        // if larger or equal
        $('nav').show();
    }
}).resize();