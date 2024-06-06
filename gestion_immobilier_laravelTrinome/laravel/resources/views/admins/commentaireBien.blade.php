<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Bien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">{{ $bien->nom }}</h1>
        <p>{{ $bien->description }}</p>
        <img src="{{ asset('uploads/' . $bien->image) }}" alt="Image du bien" class="img-fluid">
        <p>Adresse : {{ $bien->adresse }}</p>
        <p>Catégorie : {{ $bien->categorie }}</p>
        <p>Statut : {{ $bien->statut }}</p>
        <p>Date d'ajout : {{ $bien->created_at->format('d-m-Y') }}</p>

        <!-- Formulaire d'ajout de commentaire -->
        {{-- <h2 class="mt-5">Laissez un commentaire</h2>
        <form action="{{ route('commentaireAjouter', $bien->id) }}" method="post">
            @csrf
            <input type="hidden" name="bien_id" value="{{ $bien->id }}">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom complet :</label>
                <input type="text" class="form-control" id="nom" name="auteur" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Commentaire :</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publier</button>
        </form> --}}

        <!-- Liste des commentaires -->
        <h2 class="mt-5">Commentaires</h2>
        @foreach($bien->commentaires as $commentaire)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-title"><strong>Nom complet: </strong><span>{{ $commentaire->auteur }}</span></p>
                    <p class="card-text"><strong>Commentaire:</strong><br>{{ $commentaire->description }}</p>
                    <p class="card-text"><small class="text-muted">Publié le {{ $commentaire->created_at->format('d-m-Y') }}</small></p>
                    <a href="{{ route('commentaireModifier', ['id' => $bien->id, 'idCommentaire' => $commentaire->id]) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('commentaireSupprimer', ['id' => $bien->id, 'idCommentaire' => $commentaire->id]) }}" method="post" style="display: inline-block;">
                     @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <a href="{{ route('listBiens') }}" class="btn btn-secondary btn-block">Retour à la liste des biens</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
