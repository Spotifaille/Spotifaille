// Fonction pour activer et initialiser la DataTable
function dataTableInit() {
    $('#tracksDataTable').DataTable({
        "columnDefs": [
            {
                "targets": 0, // Première colonne
                "orderable": false // Désactiver le tri
            }
        ],
        "order": [] // Désactiver le tri par défaut
    });
}



    
function clickRow() {
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
}