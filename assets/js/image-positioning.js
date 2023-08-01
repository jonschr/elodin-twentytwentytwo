jQuery(document).ready(function ($) {
    window.addEventListener('resize', setPosition);

    // Initial setup
    setPosition();

    function setPosition() {
        var img = new Image();
        var section1bkg = document.getElementById('section-1-bkg');
        var style = window.getComputedStyle(section1bkg);
        img.src = style.backgroundImage
            .replace('url(', '')
            .replace(')', '')
            .replace(/['"]/g, '');

        console.log('Image URL: ' + img.src);

        img.onload = function () {
            console.log('Image Loaded');
            var imgWidth = this.width;
            var imgHeight = this.height;

            var vw = Math.max(
                document.documentElement.clientWidth || 0,
                window.innerWidth || 0
            );
            var vh = Math.max(
                document.documentElement.clientHeight || 0,
                window.innerHeight || 0
            );

            var scaleX = vw / imgWidth;
            var scaleY = vh / imgHeight;

            var scale = Math.max(scaleX, scaleY);

            var overlays = document.querySelectorAll('[data-position]');

            console.log(overlays);

            overlays.forEach(function (overlay) {
                var leftPos = overlay.getAttribute('data-position-left');
                var topPos = overlay.getAttribute('data-position-top');
                var height = overlay.getAttribute('data-height');
                overlay.style.left = leftPos * scale + 'px';
                overlay.style.top = topPos * scale + 'px';
                overlay.style.height = height * scale + 'px';
            });
        };
    }
});
