const swiper = new Swiper('.swiper', {
    speed: 400,
    autoHeight: false,
    autoplay: false,
    // Default parameters
    slidesPerView: 2.3,
    slidesPerGroup: 1,
    spaceBetween: 30,
    loop: true,
    preventClicks: false,
    preventClicksPropagation: false,

    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 480
        480: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 2,
        },
        960: {
            slidesPerView: 3,
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
