
// Fonction pour formater la durée en minutes:secondes
function formatDuration(duration_ms) {
    const minutes = Math.floor(duration_ms / 60000);
    const seconds = ((duration_ms % 60000) / 1000).toFixed(0);
    return `${minutes}:${seconds.padStart(2, '0')}`;
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


