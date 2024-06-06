<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commenter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Laissez un commentaire</h1>
        <form action="{{ route('commentaireAjouter') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom complet :</label>
                <input type="text" class="form-control" id="nom" name="auteur" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Commentaire :</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date de publication :</label>
                <input type="date" name="date_publication" id="date" value="{{ date('Y-m-d') }}">
            </div>

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
