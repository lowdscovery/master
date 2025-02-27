$(document).ready(function() {
    $('.delete-form').on('submit', function(event) {
        event.preventDefault(); // Empêche la soumission du formulaire classique

        var form = $(this);
        var id = form.find('.btn-delete').data('id'); // Récupère l'ID de l'utilisateur à supprimer
        var url = form.attr('action'); // Récupère l'URL de suppression

        $.ajax({
            url: url,
            type: 'POST',
            data: form.serialize(), // Envoie les données du formulaire
            success: function(response) {
                // Si la suppression est réussie, retirer la ligne correspondante
                $('#row-' + id).remove();
                alert('L\'utilisateur a été supprimé avec succès.');
            },
            error: function(xhr) {
                alert('Une erreur est survenue.');
            }
        });
    });
});
