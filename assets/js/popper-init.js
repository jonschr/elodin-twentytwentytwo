const tooltips = [];

// Wrap function calls in a DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', () => {
    // create each tooltip
    createTooltip('button-mirror-left', 'tooltip-mirror-left');
    createTooltip('button-mirror-right', 'tooltip-mirror-right');
    createTooltip('button-bull', 'tooltip-bull');
    createTooltip('button-sword', 'tooltip-sword');
    createTooltip('button-book', 'tooltip-book');
    createTooltip('button-cups-red', 'tooltip-cups-red');
    createTooltip('button-cups-blue', 'tooltip-cups-blue');
    createTooltip('button-cups-green', 'tooltip-cups-green');
    createTooltip('button-coin', 'tooltip-coin');
});

function createTooltip(buttonId, tooltipId) {
    const button = document.querySelector(`#${buttonId}`);
    const tooltip = document.querySelector(`#${tooltipId}`);

    const popperInstance = Popper.createPopper(button, tooltip, {
        modifiers: [
            {
                name: 'offset',
                options: {
                    offset: [0, 8],
                },
            },
        ],
    });

    tooltips.push(popperInstance);

    function show() {
        // Make the tooltip visible
        tooltip.setAttribute('data-show', '');

        // Enable the event listeners
        popperInstance.setOptions((options) => ({
            ...options,
            modifiers: [
                ...options.modifiers,
                { name: 'eventListeners', enabled: true },
            ],
        }));

        // Update its position
        popperInstance.update();
    }

    function hide() {
        // Hide the tooltip
        tooltip.removeAttribute('data-show');

        // Disable the event listeners
        popperInstance.setOptions((options) => ({
            ...options,
            modifiers: [
                ...options.modifiers,
                { name: 'eventListeners', enabled: false },
            ],
        }));
    }

    const showEvents = ['mouseenter', 'focus'];
    const hideEvents = ['mouseleave', 'blur'];

    showEvents.forEach((event) => {
        button.addEventListener(event, show);
    });

    hideEvents.forEach((event) => {
        button.addEventListener(event, hide);
    });
}
