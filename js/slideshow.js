jQuery(document).ready(function ($) {

    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;
    
    $('#slider').css({ width: slideWidth, height: slideHeight });
    
    
    if (slideCount > 1) {
        $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
        $('#slider ul li:last-child').prependTo('#slider ul');
        setInterval(function () {
            moveRight();
        }, 7500);
    } else {
        $('a.control_next,a.control_prev').hide()
        $('#slider ul').css({ width: sliderUlWidth, marginLeft: 0 });
        $('#slider ul li').prependTo('#slider ul');
    }
    

    function moveLeft() {
        $('#slider ul').animate({
            left: + slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: - slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function () {
        moveLeft();
    });

    $('a.control_next').click(function () {
        moveRight();
    });
  
  });    
  