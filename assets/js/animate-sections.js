let currentSectionIndex = 0;
const sections = Array.from(
    document.querySelectorAll('.cd-section .inner-container')
);
const nextButton = document.querySelector('a.cd-next');
const prevButton = document.querySelector('a.cd-prev');
const slideLinks = Array.from(document.querySelectorAll('a[data-slide]'));

let scaleInFrom = 0.4;
let scaleOutTo = 4;
let durationIn = 3;
let durationOut = 3;
let intermediaryDuration = 3; // Shorter duration for intermediary slides

let scrollEnabled = true;

sections.forEach((section, index) => {
    gsap.set(section, {
        scale: index === 0 ? 1 : 0,
        autoAlpha: index === 0 ? 1 : 0,
    });
    section.style.willChange = 'transform, opacity';
});

const throttle = (func, limit) => {
    let inThrottle;
    return (...args) => {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => (inThrottle = false), limit);
        }
    };
};

const transition = (nextIndex, callback, customDurationIn = durationIn) => {
    if (nextIndex != currentSectionIndex && scrollEnabled) {
        scrollEnabled = false;
        let currentSection = sections[currentSectionIndex];
        let nextSection = sections[nextIndex];
        toggleButtonVisibility(nextIndex);
        if (currentSectionIndex < nextIndex) {
            gsap.to(currentSection, {
                scale: scaleOutTo,
                autoAlpha: 0,
                duration: durationOut,
            });
            gsap.fromTo(
                nextSection,
                { scale: scaleInFrom, autoAlpha: 0 },
                { scale: 1, autoAlpha: 1, duration: customDurationIn }
            ).then(() => {
                currentSectionIndex = nextIndex;
                scrollEnabled = true;
                if (callback) callback();
            });
        } else {
            gsap.to(currentSection, {
                scale: scaleInFrom,
                autoAlpha: 0,
                duration: durationOut,
            });
            gsap.fromTo(
                nextSection,
                { scale: scaleOutTo, autoAlpha: 0 },
                { scale: 1, autoAlpha: 1, duration: customDurationIn }
            ).then(() => {
                currentSectionIndex = nextIndex;
                scrollEnabled = true;
                if (callback) callback();
            });
        }
    }
};

const transitionToSlide = (targetSlide, href) => {
    if (currentSectionIndex !== targetSlide) {
        const nextIndex =
            currentSectionIndex < targetSlide
                ? currentSectionIndex + 1
                : currentSectionIndex - 1;
        let intermediary = nextIndex !== targetSlide;
        transition(
            nextIndex,
            () => transitionToSlide(targetSlide, href),
            intermediary ? intermediaryDuration : durationIn
        );
    } else if (href) {
        gsap.to(sections[currentSectionIndex], {
            autoAlpha: 0,
            duration: durationOut,
            onComplete: () => (window.location.href = href),
        });
    }
};

nextButton.addEventListener('click', () => transition(currentSectionIndex + 1));
prevButton.addEventListener('click', () => transition(currentSectionIndex - 1));
slideLinks.forEach((link) => {
    link.addEventListener('click', (event) => {
        let slideNumber = parseInt(link.getAttribute('data-slide'));
        let href = link.getAttribute('href');
        if (href) event.preventDefault();
        transitionToSlide(slideNumber - 1, href);
    });
});

window.addEventListener(
    'wheel',
    throttle((event) => {
        if (scrollEnabled) {
            if (event.deltaY > 0) {
                if (currentSectionIndex < sections.length - 1) {
                    transition(currentSectionIndex + 1);
                }
            } else {
                if (currentSectionIndex > 0) {
                    transition(currentSectionIndex - 1);
                }
            }
            event.preventDefault();
        }
    }, 100)
);

const toggleButtonVisibility = (sectionIndex) => {
    nextButton.style.display =
        sectionIndex === sections.length - 1 ? 'none' : 'block';
    prevButton.style.display = sectionIndex === 0 ? 'none' : 'block';
};

toggleButtonVisibility(currentSectionIndex);
