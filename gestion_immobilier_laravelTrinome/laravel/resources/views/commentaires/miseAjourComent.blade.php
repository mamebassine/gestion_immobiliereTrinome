<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>commentaire</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <center>
        <h1>Commentaires</h1>
        {{-- @if (session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
        @endif --}}
      </center>
      <div class="container">
        <h1 class="mt-5">les commentaires</h1>
        
        <div class="mb-3">
            <label for="date_publication" class="form-label">Date de publication :</label>
            <input type="date" class="form-control" id="date_publication" name="date_publication" value="{{ $commentaire->date_publication }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $commentaire->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="auteur" class="form-label">Auteur :</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="{{ $commentaire->auteur }}" required>
        </div>
                <a href="{{route('supprimmerCommentaire{id}')}}" class="btn btn-primary">Supprimer</a>
            </div>
    </div>

    </div>


    <!-- Bootstrap JS (optionnel, si vous avez besoin de fonctionnalités JavaScript de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
