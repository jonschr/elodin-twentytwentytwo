function onMouseEnterMirrorRight() {
    document
        .querySelector('.mirror-right')
        .classList.add('mirror-right-active');
}

function onMouseLeaveMirrorRight() {
    setTimeout(function () {
        document
            .querySelector('.mirror-right')
            .classList.remove('mirror-right-active');
    }, 1000);
}

function onMouseEnterMirrorLeft() {
    document.querySelector('.mirror-left').classList.add('mirror-left-active');
}

function onMouseLeaveMirrorLeft() {
    setTimeout(function () {
        document
            .querySelector('.mirror-left')
            .classList.remove('mirror-left-active');
    }, 1000);
}

var buttonMirrorRight = document.querySelector('#button-mirror-right');
var tooltipMirrorRight = document.querySelector('#tooltip-mirror-right');
var buttonMirrorLeft = document.querySelector('#button-mirror-left');
var tooltipMirrorLeft = document.querySelector('#tooltip-mirror-left');

buttonMirrorRight.addEventListener('mouseenter', onMouseEnterMirrorLeft);
buttonMirrorRight.addEventListener('mouseleave', onMouseLeaveMirrorLeft);
tooltipMirrorRight.addEventListener('mouseenter', onMouseEnterMirrorLeft);
tooltipMirrorRight.addEventListener('mouseleave', onMouseLeaveMirrorLeft);

buttonMirrorLeft.addEventListener('mouseenter', onMouseEnterMirrorRight);
buttonMirrorLeft.addEventListener('mouseleave', onMouseLeaveMirrorRight);
tooltipMirrorLeft.addEventListener('mouseenter', onMouseEnterMirrorRight);
tooltipMirrorLeft.addEventListener('mouseleave', onMouseLeaveMirrorRight);
