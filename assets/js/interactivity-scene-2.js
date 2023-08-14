var isHovering = false;
var hoverTimer;

function onMouseEnterBullSword() {
    isHovering = true;
    clearTimeout(hoverTimer);
    animateSceneBackground(true);
}

function onMouseLeaveBullSword() {
    isHovering = false;
    hoverTimer = setTimeout(function () {
        animateSceneBackground(false);
    }, 1000);
}

function animateSceneBackground(activate) {
    var sceneBackground = document.querySelector('.scene-2-bkg');
    if (activate || isHovering) {
        sceneBackground.classList.add('animate-background');
    } else {
        sceneBackground.classList.remove('animate-background');
    }
}

var buttonBull = document.querySelector('#button-bull');
var tooltipBull = document.querySelector('#tooltip-bull');
var buttonSword = document.querySelector('#button-sword');
var tooltipSword = document.querySelector('#tooltip-sword');

buttonBull.addEventListener('mouseenter', onMouseEnterBullSword);
buttonBull.addEventListener('mouseleave', onMouseLeaveBullSword);
tooltipBull.addEventListener('mouseenter', onMouseEnterBullSword);
tooltipBull.addEventListener('mouseleave', onMouseLeaveBullSword);

buttonSword.addEventListener('mouseenter', onMouseEnterBullSword);
buttonSword.addEventListener('mouseleave', onMouseLeaveBullSword);
tooltipSword.addEventListener('mouseenter', onMouseEnterBullSword);
tooltipSword.addEventListener('mouseleave', onMouseLeaveBullSword);
