let currentSectionIndex = 0;
const sections = Array.from(
    document.querySelectorAll('.cd-section .inner-container')
);

// get the number of sections
const sectionCount = sections.length;

const nextButton = document.querySelector('a.cd-next');
const prevButton = document.querySelector('a.cd-prev');
const slideLinks = Array.from(document.querySelectorAll('a[data-slide]'));

// Configuration variables
let scaleInFrom = 0.4;
let scaleOutTo = 4;
let durationIn = 3; // duration of animation in seconds for next section
let durationOut = 3; // duration of animation in seconds for current section

let scrollEnabled = true;

// Initial setup
sections.forEach((section, index) => {
    gsap.set(section, {
        scale: index === 0 ? 1 : 0,
        autoAlpha: index === 0 ? 1 : 0,
    });
});

// Function to animate transition between sections
const transition = (nextIndex) => {
    if (nextIndex != currentSectionIndex && scrollEnabled) {
        scrollEnabled = false;
        let currentSection = sections[currentSectionIndex];
        let nextSection = sections[nextIndex];

        // Update button visibility based on next section
        toggleButtonVisibility(nextIndex);

        if (currentSectionIndex < nextIndex) {
            // Moving forward
            gsap.to(currentSection, {
                scale: scaleOutTo,
                autoAlpha: 0,
                duration: durationOut,
            });
            gsap.fromTo(
                nextSection,
                { scale: scaleInFrom, autoAlpha: 0 },
                { scale: 1, autoAlpha: 1, duration: durationIn }
            ).then(() => {
                currentSectionIndex = nextIndex;
                scrollEnabled = true;
            });
        } else {
            // Moving backward
            gsap.to(currentSection, {
                scale: scaleInFrom,
                autoAlpha: 0,
                duration: durationOut,
            });
            gsap.fromTo(
                nextSection,
                { scale: scaleOutTo, autoAlpha: 0 },
                { scale: 1, autoAlpha: 1, duration: durationIn }
            ).then(() => {
                currentSectionIndex = nextIndex;
                scrollEnabled = true;
            });
        }
    }
};

// Event listeners for click
nextButton.addEventListener('click', () => transition(currentSectionIndex + 1));
prevButton.addEventListener('click', () => transition(currentSectionIndex - 1));
slideLinks.forEach((link) => {
    link.addEventListener('click', () => {
        let slideNumber = parseInt(link.getAttribute('data-slide'));
        transition(slideNumber - 1); // subtract 1 to match array index (0-based)
    });
});

// Event listener for scroll
window.addEventListener('wheel', (event) => {
    if (scrollEnabled) {
        if (event.deltaY > 0) {
            // only scroll down if not on last section
            console.log('Count: ' + sections.length);
            console.log('Current+1: ' + (currentSectionIndex + 1));

            if (currentSectionIndex < sections.length - 1) {
                transition(currentSectionIndex + 1);
            }
        } else {
            // only scroll up if not going previous to the first section
            if (currentSectionIndex > 0) {
                transition(currentSectionIndex - 1);
            }
        }
        event.preventDefault();
    }
});

// Function to toggle button visibility
const toggleButtonVisibility = (sectionIndex) => {
    nextButton.style.display =
        sectionIndex === sections.length - 1 ? 'none' : 'block';
    prevButton.style.display = sectionIndex === 0 ? 'none' : 'block';
};

// Initial call to set button visibility
toggleButtonVisibility(currentSectionIndex);
