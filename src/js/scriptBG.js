let currentColor1 = getRandomColor();
let currentColor2 = getRandomColor();
let nextColor1 = getRandomColor();
let nextColor2 = getRandomColor();
let progress = 0;


function animateBackground() {
    const body = document.body;

    // Blend colors based on progress
    const blendedColor1 = blendColors(currentColor1, nextColor1, progress);
    const blendedColor2 = blendColors(currentColor2, nextColor2, progress);

    // Apply the new blended colors
    body.style.background = `linear-gradient(135deg, ${arrayToRgb(blendedColor1)}, ${arrayToRgb(blendedColor2)})`;

    // Increment progress
    progress += 0.01;

    if (progress >= 1) {
        // Reset colors once the transition is complete
        currentColor1 = nextColor1;
        currentColor2 = nextColor2;
        nextColor1 = getRandomColor();
        nextColor2 = getRandomColor();
        progress = 0;
    }

    requestAnimationFrame(animateBackground);
}

document.addEventListener('DOMContentLoaded', () => {
    animateBackground(); // Start the animation
});

function rgbToArray(rgb) {
    return rgb.match(/\d+/g).map(Number);
}

function arrayToRgb(arr) {
    return `rgb(${arr[0]}, ${arr[1]}, ${arr[2]})`;
}

function blendColors(startColor, endColor, progress) {
    const blended = startColor.map((start, index) => {
        return Math.round(start + (endColor[index] - start) * progress);
    });
    return blended;
}

function getRandomColor() {
    return [Math.floor(Math.random() * 256), Math.floor(Math.random() * 256), Math.floor(Math.random() * 256)];
}

