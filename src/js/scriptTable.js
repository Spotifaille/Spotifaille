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


