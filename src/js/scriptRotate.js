document.addEventListener('DOMContentLoaded', () => {
    const img = document.getElementById('rotatingImage');
    let angle = 0;
    let speed = 0;
    let isDragging = false;
    let lastMouseX = 0;

    function rotateImage() {
        if (speed !== 0) {
            angle += speed;
            img.style.transform = `rotate(${angle}deg)`;
            speed *= 0.98; // Gradually slow down the rotation
            if (Math.abs(speed) < 0.01) {
                speed = 0;
            }
        }
        requestAnimationFrame(rotateImage);
    }

    img.addEventListener('mousedown', (event) => {
        isDragging = true;
        lastMouseX = event.clientX;
        event.preventDefault(); // Prevent default dragging behavior
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
    });

    document.addEventListener('mousemove', (event) => {
        if (isDragging) {
        const deltaX = event.clientX - lastMouseX;
        speed = deltaX * 0.7; // Adjust the multiplier to control the sensitivity
        lastMouseX = event.clientX;
        event.preventDefault(); // Prevent default dragging behavior
        }
    });

    rotateImage();
});
    /*
    DVD move
    const img = document.getElementById('movingImage');
    let posX = 0;
    let posY = 0;
    let speedX = 2;
    let speedY = 2;

    function moveImage() {
        const imgWidth = img.offsetWidth;
        const imgHeight = img.offsetHeight;
        const windowWidth = window.innerWidth;
        const windowHeight = window.innerHeight;

        posX += speedX;
        posY += speedY;

        if (posX + imgWidth >= windowWidth || posX <= 0) {
            speedX = -speedX;
        }

        if (posY + imgHeight >= windowHeight || posY <= 0) {
            speedY = -speedY;
        }

        img.style.left = `${posX}px`;
        img.style.top = `${posY}px`;

        requestAnimationFrame(moveImage);
    }

    moveImage(); // Start the movement
    */