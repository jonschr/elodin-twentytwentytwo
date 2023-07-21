jQuery(document).ready(function ($) {
    var sections = $('.cd-section');
    var currentSectionIndex = 0;
    var isScrolling = false;

    // detect scroll event
    $(window).on('wheel', function (e) {
        // if an animation is already in progress, do nothing
        if (isScrolling) return;

        e.preventDefault(); // prevent default scroll

        isScrolling = true;

        if (e.originalEvent.deltaY < 0) {
            // scrolling up
            currentSectionIndex = Math.max(0, currentSectionIndex - 1);
        } else {
            // scrolling down
            currentSectionIndex = Math.min(
                sections.length - 1,
                currentSectionIndex + 1
            );
        }

        // scroll to the current section
        $('html, body').animate(
            {
                scrollTop: sections.eq(currentSectionIndex).offset().top,
            },
            1000,
            function () {
                // Animation complete.
                isScrolling = false;
            }
        );
    });
});
