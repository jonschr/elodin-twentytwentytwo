jQuery(document).ready(function ($) {
    var anchorLinks = $("a[href^='#']:not([href='#'])"); // Select anchor links that start with '#' but not equal to '#'

    if (anchorLinks.length > 0) {
        // Check if there are anchor links
        anchorLinks.on('click', function (event) {
            event.preventDefault();
            var target = document.querySelector(
                event.target.getAttribute('href')
            );

            if (target) {
                var offset = target.offsetTop;
                $('html, body').animate(
                    { scrollTop: offset },
                    'slow',
                    function () {
                        // Add the "active" class to the clicked anchor link
                        $(
                            "a[href='" +
                                event.target.getAttribute('href') +
                                "']"
                        ).addClass('active');
                    }
                );
            }
        });

        $(window).on('scroll', function () {
            var scrollPosition = $(window).scrollTop();
            var closestTarget = null;
            var closestDistance = Infinity;

            anchorLinks.each(function () {
                var target = document.querySelector($(this).attr('href'));

                if (target) {
                    var targetOffset = target.offsetTop;
                    var targetHeight = $(target).outerHeight();

                    var distance = Math.abs(scrollPosition - targetOffset);

                    if (distance < closestDistance) {
                        closestDistance = distance;
                        closestTarget = $(this);
                    }

                    if (
                        scrollPosition >= targetOffset &&
                        scrollPosition < targetOffset + targetHeight
                    ) {
                        // Remove the "active" class from all anchor links
                        anchorLinks.removeClass('active');
                        // Add the "active" class to the anchor link pointing to the in-view element
                        $(this).addClass('active');
                    }
                }
            });

            // Add the "active" class to the closest anchor link to the scroll position if no in-view element found
            if (closestTarget && !closestTarget.hasClass('active')) {
                // Remove the "active" class from all anchor links
                anchorLinks.removeClass('active');
                // Add the "active" class to the closest anchor link
                closestTarget.addClass('active');
            }
        });
    }
});
