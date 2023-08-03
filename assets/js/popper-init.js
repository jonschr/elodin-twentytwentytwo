const tooltips = [];
let activeTooltip = null;

document.addEventListener('DOMContentLoaded', () => {
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
        if (activeTooltip) {
            activeTooltip.hide();
        }
        tooltip.setAttribute('data-show', '');
        popperInstance.setOptions((options) => ({
            ...options,
            modifiers: [
                ...options.modifiers,
                { name: 'eventListeners', enabled: true },
            ],
        }));
        popperInstance.update();
        activeTooltip = { hide };
    }

    function hide() {
        tooltip.removeAttribute('data-show');
        popperInstance.setOptions((options) => ({
            ...options,
            modifiers: [
                ...options.modifiers,
                { name: 'eventListeners', enabled: false },
            ],
        }));
    }

    const showEvents = ['mouseenter', 'focus'];

    showEvents.forEach((event) => {
        button.addEventListener(event, show);
    });
}
