$('.main-header__button').on('click', function() {
    $('.hamburger-menu').toggleClass('animate');
    $('nav').slideToggle();
});