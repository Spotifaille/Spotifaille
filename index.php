<!DOCTYPE html>
<html>
<head>
    <title>DevOps</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            transition: background 4s ease, color 2s ease; /* Smooth background transition with color */
        }
        h1 {
            font-size: 4em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <h1>Hello World test</h1>
    <script>
        function invertBackground() {
            const body = document.body;
            const randomColor1 = `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`;
            const randomColor2 = `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`;
            const randomFontColor = `rgb(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)})`;
            body.style.background = `linear-gradient(135deg, ${randomColor1}, ${randomColor2})`;
            body.style.color = randomFontColor;
        }

        setInterval(invertBackground, 4000); // Interval of 4 seconds
    </script>
</body>
</html>
