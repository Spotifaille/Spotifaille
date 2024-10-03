document.addEventListener('DOMContentLoaded', () => {
    const img = document.getElementById('rotatingImage');
    let angle = 0;
    let speed = 0.5; // Initial speed
    let decreasing = false;

    function rotateImage() {
        angle += speed;
        img.style.transform = `rotate(${angle}deg)`;

        if (decreasing) {
            speed -= 0.1; // Decrease speed gradually
            if (speed <= 0) {
                speed = 0;
                decreasing = false;
            }
        } else {
            speed += 0.1; // Increase speed gradually
            if (speed >= 100) {
                decreasing = true;
            }
        }

        requestAnimationFrame(rotateImage);
    }

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