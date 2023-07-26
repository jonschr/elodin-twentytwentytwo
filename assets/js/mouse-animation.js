// Get the container and layers
const container = document.querySelector('.container');
const layers = document.querySelectorAll('[data-depth]');

let timeoutId = null;

// Function to run on mouse move
function handleMouseMove(e) {
    const { width, height } = container.getBoundingClientRect();
    const x = e.clientX / width;
    const y = e.clientY / height;

    // For each layer, create an animation to the mouse position
    layers.forEach((layer) => {
        const depth = layer.dataset.depth;
        const movement = -(depth * 100);

        // Set the z-index based on the depth
        layer.style.zIndex = depth * 1000; // You might need to adjust the factor

        gsap.to(layer, {
            x: x * movement,
            y: y * movement,
            duration: 2,
            ease: 'power4.easeInOut',
            overwrite: 'auto',
        });
    });

    // Clear the existing timeout and set a new one
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => {
        // Stop the animation when the mouse stops moving
        gsap.killTweensOf(layers);
    }, 1000); // stop the animation after 1 second of no mouse movement
}

// Attach the event listener
container.addEventListener('mousemove', handleMouseMove);
