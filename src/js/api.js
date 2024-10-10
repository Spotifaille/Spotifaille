var player;
var isPlaying = false;  // Garde la trace de l'état de lecture
var currentButton = null;  // Garde une référence du bouton actuellement actif

document.addEventListener('DOMContentLoaded', function() {
    /*---- YouTube API ----*/

    // Charge l'API IFrame YouTube de manière asynchrone
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    document.querySelectorAll('.play-button').forEach(function(cell) {
        cell.addEventListener('click', function() {
            var trackName = this.getAttribute('data-track');
            var artistName = this.getAttribute('data-artist');
            const query = `${trackName} ${artistName}`;

            // Gestion du changement d'icône et du lecteur
            togglePlayPause(this, query);
        });
    });
});

function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '0',  // invisible player
        width: '0',
        videoId: '',
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

// Fonction pour rechercher une vidéo YouTube et gérer le bouton play/pause
function searchYouTubeVideo(query, button) {
    const apiKey = 'AIzaSyB1g2vq0KkPaeIBfbUOki9bPIXGzZR8XEw';  // Remplace par ta clé API YouTube
    const searchUrl = `https://www.googleapis.com/youtube/v3/search?part=snippet&q=${encodeURIComponent(query)}&type=video&key=${apiKey}`;

    fetch(searchUrl)
    .then(response => response.json())
    .then(data => {
        if (data.items.length > 0) {
            const videoId = data.items[0].id.videoId;
            player.loadVideoById(videoId);  // Charge la nouvelle vidéo dans le lecteur
            document.getElementById("playButton").disabled = false;
            document.getElementById("pauseButton").disabled = false;
            updateButtonState(button, true);  // Met à jour l'état du bouton
        } else {
            alert('Aucune vidéo trouvée pour ce titre.');
        }
    })
    .catch(error => {
        console.error('Erreur lors de la recherche de la vidéo YouTube:', error);
    });
}

// Nouvelle fonction pour gérer le changement d'icône et le contrôle du lecteur
function togglePlayPause(button, query) {
    var playIcon = button.querySelector('.fa-play');
    var pauseIcon = button.querySelector('.fa-pause');

    // Si un autre bouton était en cours de lecture, le remettre à Play et arrêter la vidéo
    if (currentButton && currentButton !== button) {
        resetPreviousButton();  // Remettre à zéro l'ancien bouton
        player.stopVideo();  // Arrêter la vidéo en cours
    }

    if (!isPlaying || currentButton !== button) {
        // Charger la nouvelle vidéo si c'est un nouveau bouton
        searchYouTubeVideo(query, button);
        currentButton = button;  // Mettre à jour le bouton en cours
    } else {
        // Pause ou reprendre si le même bouton est cliqué
        if (isPlaying) {
            player.pauseVideo();  // Met en pause si la vidéo est en lecture
            updateButtonState(button, false);  // Met à jour l'état du bouton
        } else {
            player.playVideo();  // Reprendre la lecture si en pause
            updateButtonState(button, true);  // Met à jour l'état du bouton
        }
    }
}

// Fonction pour réinitialiser le bouton précédemment en pause
function resetPreviousButton() {
    if (currentButton) {
        updateButtonState(currentButton, false);  // Remettre à "Play" l'ancien bouton
        currentButton = null;  // Réinitialise le bouton actif
    }
}

// Fonction utilitaire pour mettre à jour l'état du bouton (Play ou Pause)
function updateButtonState(button, isPlayingNow) {
    var playIcon = button.querySelector('.fa-play');
    var pauseIcon = button.querySelector('.fa-pause');
    
    if (isPlayingNow) {
        playIcon.style.display = 'none';
        pauseIcon.style.display = 'inline-block';
        isPlaying = true;
    } else {
        playIcon.style.display = 'inline-block';
        pauseIcon.style.display = 'none';
        isPlaying = false;
    }
}
