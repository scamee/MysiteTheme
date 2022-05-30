$(function () {
    function fianim() {
        $('.fade-in').each(function () {
            var target = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > target - windowHeight) {
                $(this).addClass('scroll-in');
            }
        });
    }
    fianim();
    $(window).scroll(function () {
        fianim();
    });
});