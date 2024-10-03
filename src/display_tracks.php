<!DOCTYPE html>
<html>
<head>
    <title>Spotifaille</title>
    <link rel="icon" href="/img/Spotifaille.ico">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            transition: background 4s ease, color 2s ease; /* Smooth background transition with color */
        }
        h1 {
            font-size: 3em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }
        #tracks-table {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            max-width: 800px;
            overflow: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        th {
            background-color: rgba(0, 0, 0, 0.2);
        }
        #back-link {
            margin-top: 20px;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        #back-link:hover {
            background-color: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
    <h1>Spotifaille</h1>
    <div id="tracks-table"></div>
    <a href="index.php" id="back-link">Back to Home</a>

    <script>
    // Fonction pour formater la durée en minutes:secondes
    function formatDuration(duration_ms) {
        const minutes = Math.floor(duration_ms / 60000);
        const seconds = ((duration_ms % 60000) / 1000).toFixed(0);
        return `${minutes}:${seconds.padStart(2, '0')}`;
    }

    // Fonction pour charger le fichier JSON
    function loadJSON(callback) {
        fetch('Spotify_songs_attributes.json')
            .then(response => response.json())
            .then(data => callback(data))
            .catch(error => console.error('Error:', error));
    }

    // Fonction pour afficher le tableau des pistes
    function displayTracks(data) {
        const tableContainer = document.getElementById('tracks-table');
        let tableHTML = `
            <table id="tracksDataTable" class="display">
                <thead>
                    <tr>
                        <th>Track Name</th>
                        <th>Artist Name</th>
                        <th>Genre</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
        `;

        data.forEach(track => {
            tableHTML += `
                <tr>
                    <td>${track.trackName}</td>
                    <td>${track.artistName}</td>
                    <td>${track.genre}</td>
                    <td>${formatDuration(track.duration_ms)}</td>
                </tr>
            `;
        });

        tableHTML += `
                </tbody>
            </table>
        `;

        tableContainer.innerHTML = tableHTML;

        // Initialiser DataTable
        $('#tracksDataTable').DataTable();
    }

    // Charger et afficher les pistes
    loadJSON(displayTracks);
    </script>

    <script>
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

        animateBackground(); // Start the animation
    </script>
</body>
</html>