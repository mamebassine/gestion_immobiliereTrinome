<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Commentaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Modifier le Commentaire</h1>
        <form action="{{ route('commentaireMettreAJour', $commentaire->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="auteur" class="form-label">Nom complet :</label>
                <input type="text" class="form-control" id="auteur" name="auteur" value="{{ $commentaire->auteur }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Commentaire :</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $commentaire->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
