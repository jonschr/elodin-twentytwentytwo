jQuery(document).ready(function ($) {
    $("a[href^='#']:not(.menu-bar-items a)").on('click', function (event) {
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
