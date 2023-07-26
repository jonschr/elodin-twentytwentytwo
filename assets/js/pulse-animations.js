function getRandomInterval(min, max) {
    return Math.random() * (max - min) + min;
}

function triggerPulseAnimation(element) {
    const pulse = element.querySelector('.pulse');
    pulse.style.animation = 'pulseAnimation 0.8s ease-in-out 1';

    // Remove the animation after it finishes
    setTimeout(() => {
        pulse.style.animation = '';
    }, 800);
}

function startRandomPulseAnimations() {
    setInterval(() => {
        const dots = document.querySelectorAll('.dot');
        const randomDotIndex = Math.floor(Math.random() * dots.length);
        const randomDot = dots[randomDotIndex];
        triggerPulseAnimation(randomDot);
    }, getRandomInterval(2000, 5000));
}

function addEventListenersToDots() {
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot) => {
        dot.addEventListener('mouseover', () => {
            triggerPulseAnimation(dot);
        });
        dot.addEventListener('click', () => {
            triggerPulseAnimation(dot);
        });
    });
}

startRandomPulseAnimations();
addEventListenersToDots();
