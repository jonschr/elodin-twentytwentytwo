AOS.init();

jQuery(document).ready(function ($) {
    // when the user clicks .toggle-subnav, toggle the .open class on .toggle-subnav, and toggle the .active class on .nav-content
    $('.toggle-subnav').click(function (event) {
        event.preventDefault();
        $(this).toggleClass('open');
        $('.nav-content').toggleClass('active');
        return false; // Add this line to prevent the click event from scrolling to the top of the page
    });
});

// Get all the iframes present on the page
const iframes = document.querySelectorAll('iframe');

// Loop through each iframe to check if it contains "youtube.com" in its src
for (const iframe of iframes) {
    const src = iframe.getAttribute('src');
    if (src.includes('youtube.com')) {
        // Append ?rel=0 to the existing src
        const modifiedSrc = src + '&rel=0';
        iframe.setAttribute('src', modifiedSrc);
    }
}

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
        autoplaySpeed: 4000,
    });
});

jQuery(document).ready(function ($) {
    $("a[href^='#']:not(.menu-bar-items a)").on('click', function (event) {
        if (!$(this).hasClass('toggle-subnav')) {
            event.preventDefault();
            var href = $(this).attr('href');

            if (href === '#') {
                // Scroll to the top
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth',
                });
            } else {
                scrollToElement(href);
            }
        }
    });

    // Wait until the page has fully loaded before checking for a hash in the URL
    $(window).on('load', function () {
        if (window.location.hash) {
            scrollToElement(window.location.hash);
        }
    });
});

function scrollToElement(href) {
    var target = document.querySelector(href);
    if (target) {
        var header = document.querySelector('#sticky-navigation');
        var headerHeight = header ? header.offsetHeight : 0;
        var offset = target.offsetTop - headerHeight;

        window.scrollTo({
            top: offset,
            behavior: 'smooth',
        });
    }
}

const swiper = new Swiper('.swiper', {
    speed: 400,
    autoHeight: false,
    autoplay: false,
    // Default parameters
    slidesPerView: 1.3,
    slidesPerGroup: 1,
    spaceBetween: 30,
    loop: true,
    preventClicks: false,
    preventClicksPropagation: false,

    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 480
        600: {
            slidesPerView: 2.3,
        },

        1025: {
            slidesPerView: 2.3,
        },
        1500: {
            slidesPerView: 3.3,
        },
    },
    // // Optional parameters
    // // direction: 'vertical',

    // // If we need pagination
    // pagination: {
    //     el: '.swiper-pagination',
    // },

    // // Navigation arrows
    navigation: {
        nextEl: '.properties-swiper-button-next',
        prevEl: '.properties-swiper-button-prev',
    },

    // // And if we need scrollbar
    // scrollbar: {
    //     el: '.swiper-scrollbar',
    // },
});
