jQuery(document).ready(function ($) {
    $(".smooth-scroll[href^='#'], .menu-item > a[href^='#']").on(
        'click',
        function (event) {
            event.preventDefault();
            var target = document.querySelector(
                this.href.substring(this.href.indexOf('#'))
            );

            if (target) {
                var offset = target.offsetTop;
                $('html, body').animate(
                    { scrollTop: offset },
                    'slow',
                    function () {
                        $(
                            ".smooth-scroll[href='" +
                                target.id +
                                "'], .menu-item > a[href='" +
                                target.id +
                                "']"
                        ).addClass('active');
                    }
                );
            }
        }
    );

    $(window).on('scroll', function () {
        var scrollPosition = $(window).scrollTop();
        var closestTarget = null;
        var closestDistance = Infinity;

        $(".smooth-scroll[href^='#'], .menu-item > a[href^='#']").each(
            function () {
                var target = document.querySelector(
                    this.href.substring(this.href.indexOf('#'))
                );

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
                        $(
                            ".smooth-scroll[href^='#'], .menu-item > a[href^='#']"
                        ).removeClass('active');
                        $(this).addClass('active');
                    }
                }
            }
        );

        if (!closestTarget.hasClass('active')) {
            $(
                ".smooth-scroll[href^='#'], .menu-item > a[href^='#']"
            ).removeClass('active');
            closestTarget.addClass('active');
        }
    });
});
