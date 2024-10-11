<?php
include_once 'db_connection.php';
# Lire les données dans le POST vérifie avec des isset sinon renvoie sur le display_tracks
if (!isset($_POST['trackName']) || !isset($_POST['artistName'])) {
    header('Location: display_tracks.php');
    exit;
}

$trackName = $_POST['trackName'];
$artistName = $_POST['artistName'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Spotifaille</title>
    <link rel="icon" href="/img/Spotifaille.ico">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="js/scriptBG.js"></script>
    <script src="js/scriptTable.js"></script>
</head>
<body>
    <h1 class="titleSpot"><?php htmlspecialchars($trackName); ?></h1>
    <h2 class="artistName"><?php htmlspecialchars($artistName); ?></h2>
    <div id="track-info">
        <?php
        $track = $collection->findOne([
            'trackName' => $trackName,
            'artistName' => $artistName
        ]);
        if ($track) {
            echo '<div class="info-card">';
            
            $info = [
                "Milliseconds Played" => $track['msPlayed'],
                "Genre" => $track['genre'],
                "Danceability" => $track['danceability'],
                "Energy" => $track['energy'],
                "Key" => $track['key'],
                "Loudness" => $track['loudness'],
                "Mode" => $track['mode'],
                "Speechiness" => $track['speechiness'],
                "Acousticness" => $track['acousticness'],
                "Instrumentalness" => $track['instrumentalness'],
                "Liveness" => $track['liveness'],
                "Valence" => $track['valence'],
                "Tempo" => $track['tempo'],
                "Type" => $track['type'],
                "ID" => $track['id'],
                "URI" => $track['uri'],
                "Track Href" => $track['track_href'],
                "Analysis URL" => $track['analysis_url'],
                "Duration (ms)" => $track['duration_ms'],
                "Time Signature" => $track['time_signature']
            ];

            $chunks = array_chunk($info, 10, true);

            foreach ($chunks as $index => $chunk) {
                echo "<div class='info-card-col'>";
                foreach ($chunk as $key => $value) {
                    echo "<p class='info-card-row'><strong>" . htmlspecialchars($key) . " :</strong> " . htmlspecialchars($value) . "</p>";
                }
                echo '</div>';
            }

            echo '</div>';
        } else {
            echo "<p>Track details not found.</p>";
        }
        ?>
    </div>
    <a href="display_tracks.php" id="back-link">Back to Tracklist</a>
</body>
</html>
