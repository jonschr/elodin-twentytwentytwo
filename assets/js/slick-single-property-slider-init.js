jQuery(document).ready(function ($) {
    $('.single-property-slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        centerMode: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ],
    });

    $('.single-property-prev').click(function () {
        $('.single-property-slider').slick('slickPrev');
    });

    $('.single-property-next').click(function () {
        $('.single-property-slider').slick('slickNext');
    });
});
