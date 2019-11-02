$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('#scroll-to-top').fadeIn();
        } else {
            $('#scroll-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('.scroll-to-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });
    $(".btn-search").click(function(e) {
        e.preventDefault();
        $('form.search-nav').find('input.search').toggleClass('d-none');
    });
    $('.top-nav.navbar-nav li').click(function(e) {
        $('.top-nav.navbar-nav li').each(function(e) {
            $(this).removeClass('active');
        })

        $(this).addClass('active');
    });
    $('nav .navbar-nav li').click(function(e) {
        $('nav .navbar-nav li').each(function(e) {
            $(this).removeClass('active');
        })

        $(this).addClass('active');
    });
});