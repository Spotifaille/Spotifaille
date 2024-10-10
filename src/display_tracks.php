<?php
include('db_connection.php');
// get all the track names
$tracks = $collection->find([]);

// Fonction pour formater la durée en minutes:secondes
function formatDuration($duration_ms) {
    $minutes = floor($duration_ms / 60000);
    $seconds = ($duration_ms % 60000) / 1000;
    return sprintf('%d:%02d', $minutes, $seconds);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Spotifaille</title>
    <link rel="icon" href="/img/Spotifaille.ico">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="js/scriptBG.js"></script>
    <script src="js/scriptTable.js"></script>
    <script src="js/api.js"></script>

</head>
<body>
    <h1 class="titleSpot">Spotifaille</h1>
    <div id="tracks-table">
        <?php
            echo('
            <table id="tracksDataTable" class="display">
            <thead>
                <tr>
                    <th></th>
                    <th>Track Name</th>
                    <th>Artist Name</th>
                    <th>Genre</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>
            ');
            
            foreach($tracks as $track) {
                echo("
                    <tr class='track-row' data-track-name='$track->trackName' data-artist-name='$track->artistName'>
                        <td class='play-button' data-track='$track->trackName' data-artist='$track->artistName'><i class='fas fa-play'></i></td>
                        <td class='track-info'>$track->trackName</td>
                        <td class='track-info'>$track->artistName</td>
                        <td class='track-info'>$track->genre</td>
                        <td class='track-info'>". formatDuration(intval($track->duration_ms)) ."</td>
                    </tr>
                ");
            };

            echo("
                </tbody>
            </table>
            ");
        ?>
    </div>
    <a href="index.php" id="back-link">Back to Home</a>
  <!-- Lecteur YouTube (invisible) -->
  <div id="player"></div>

  <!-- Boutons de contrôle avec icônes -->
  <div class="control-buttons">
    <button id="playButton" disabled><i class="fas fa-play"></i></button>
    <button id="pauseButton" disabled><i class="fas fa-pause"></i></button>
  </div>

  <!-- API YouTube -->

    <form id="track-form" action="track_details.php" method="POST" style="display: none;">
        <input type="hidden" name="trackName" id="trackName">
        <input type="hidden" name="artistName" id="artistName">
    </form>
    

    <script>
        document.querySelectorAll('.track-row').forEach(row => {
            row.addEventListener('click', function(event) {
                if (!event.target.closest('.play-button')) {
                    const trackName = this.getAttribute('data-track-name');
                    const artistName = this.getAttribute('data-artist-name');
                    document.getElementById('trackName').value = trackName;
                    document.getElementById('artistName').value = artistName;
                    document.getElementById('track-form').submit();
                }
            });
        });
    </script>
</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    dataTableInit();
});
</script>

