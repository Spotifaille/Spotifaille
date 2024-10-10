document.addEventListener('DOMContentLoaded', function() {
    /*---- YouTube API ----*/

    // Charge l'API IFrame YouTube de manière asynchrone
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    

    document.querySelectorAll('.play-button').forEach(function(cell) {
        cell.addEventListener('click', function() {
            // Récupérer les données de la cellule
            var trackName = this.getAttribute('data-track');
            var artistName = this.getAttribute('data-artist');
            const query = `${trackName} ${artistName}`;
            searchYouTubeVideo(query);  // Recherche et lit la vidéo associée au titre et à l'artiste
        });
    });
});

var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '0', // hauteur à 0 pour rendre invisible la vidéo
        width: '0',  // largeur à 0 pour rendre invisible la vidéo
        videoId: '', // Remplace par l'ID de la vidéo YouTube
        events: {
            'onReady': onPlayerReady
        }
    });
}

function onPlayerReady(event) {
    var playButton = document.getElementById("playButton");
    var pauseButton = document.getElementById("pauseButton");

    playButton.addEventListener("click", function() {
        player.playVideo();
    });

    pauseButton.addEventListener("click", function() {
        player.pauseVideo();
    });   
}

// Fonction pour rechercher une vidéo YouTube à partir du titre de musique et de l'artiste
function searchYouTubeVideo(query) {
    const apiKey = 'AIzaSyB1g2vq0KkPaeIBfbUOki9bPIXGzZR8XEw';  // Remplace par ta clé API YouTube
    const searchUrl = `https://www.googleapis.com/youtube/v3/search?part=snippet&q=${encodeURIComponent(query)}&type=video&key=${apiKey}`;

    fetch(searchUrl)
    .then(response => response.json())
    .then(data => {
        if (data.items.length > 0) {
            const videoId = data.items[0].id.videoId;
            player.loadVideoById(videoId);  // Charge la vidéo dans le lecteur
            document.getElementById("playButton").disabled = false;
            document.getElementById("pauseButton").disabled = false;
        } else {
            alert('Aucune vidéo trouvée pour ce titre.');
        }
    })
    .catch(error => {
        console.error('Erreur lors de la recherche de la vidéo YouTube:', error);
    });
}