<?php
include('db_connection.php');
// get all the track names
$tracks = $collection->find([], ['projection' => ['trackName' => 1, 'artistName' => 1, 'genre' => 1, 'duration_ms' => 1, '_id' => 0]]);

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
    <div class="container">
        <div class="loader">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>

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
                    <tr>
                        <td class='play-button' data-track='$track->trackName' data-artist='$track->artistName'>
                            <i class='fas fa-play'></i>
                            <i class='fas fa-pause' style='display:none;'></i>
                        </td>
                        <td>$track->trackName</td>
                        <td>$track->artistName</td>
                        <td>$track->genre</td>
                        <td>". formatDuration(intval($track->duration_ms)) ."</td>
                    </tr>
                ");
            };

            echo("
                </tbody>
            </table>
            ");
        ?>
    </div>
    <div class="loader2">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div>
        <a href="index.php" id="back-link">Back to Home</a>
    </div>
    
    <!-- Lecteur YouTube (invisible) -->
  <div id="player"></div>
  </body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    dataTableInit();
});
</script>
