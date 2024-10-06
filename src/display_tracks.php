<?php
include('db_connection.php');
// get all the track names
$tracks = $collection->find([], ['projection' => ['trackName' => 1, 'artistName' => 1, 'genre' => 1, 'duration_ms' => 1, '_id' => 0]]);

$tracksArray = iterator_to_array($tracks);
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
    <h1 class="titleSpot">Spotifaille</h1>
    <div id="tracks-table"></div>
    <a href="index.php" id="back-link">Back to Home</a>

</body>
</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tracks = <?php echo json_encode($tracksArray) ?>;
    displayTracks(tracks);
});
</script>