window.addEventListener('load', function () {
    if (!window.location.search.includes('fadein')) {
        document.body.style.opacity = '1'; // Instantly set opacity to 1
        return; // Bail out since there's no fade-in animation
    }

    // Import GSAP here if you haven't already

    const bodyElement = document.body;

    gsap.fromTo(bodyElement, { opacity: 0 }, { opacity: 1, duration: 1.5 });
});
