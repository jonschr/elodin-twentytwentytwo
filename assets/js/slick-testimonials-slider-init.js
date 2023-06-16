jQuery(document).ready(function ($) {
    $('.testimonials-slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        fade: true,
        centerMode: false,
        speed: 300,
        adaptiveHeight: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});
