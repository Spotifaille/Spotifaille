<!DOCTYPE html>
<html>
<head>
    <title>Spotify Tracks</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1DB954, #191414);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
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
    <h1>Spotify Tracks</h1>
    <div id="tracks-table"></div>
    <a href="index.html" id="back-link">Back to Home</a>

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
            <table>
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
    }

    // Charger et afficher les pistes
    loadJSON(displayTracks);
    </script>
</body>
</html>