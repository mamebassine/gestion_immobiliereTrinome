<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Des biens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Agence Immobilière</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Rechercher">
                        <button class="btn btn-outline-success" type="submit">Recherche</button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('deconnexion') }}">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container my-5">
        <div class="row">
            @foreach($biens as $bien)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm h-100">
                    <img src="{{ asset('uploads/' . $bien->image) }}" class="card-img-top img-fluid h-100" alt="Image de {{$bien->nom}}">
                    <div class="card-body d-flex flex-column"> 
                        <h2>175000 <strong>CFA</strong></h2>
                        <h5 class="card-title">{{$bien->nom}}</h5>
                        <p class="card-text">{{$bien->description}}</p>
                        <p class="text-muted">{{$bien->categorie}}</p>
                        <p class="text-muted">{{$bien->date_ajout}}</p>
                        <p class="text-muted">{{$bien->statut}}</p>
                        <div class="mt-auto">
                            <div class="btn-group mt-auto">
                                <a href="{{ route('details', $bien->id) }}" class="btn btn-sm btn-outline-primary">Plus d'informations</a>
                                <a href="{{ route('editerBien', $bien->id) }}" class="btn btn-sm btn-outline-warning">Modifier</a>
                            </div>
                            <form action="{{ route('supprimerBien', $bien->id) }}" method="POST" class="d-inline mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <footer class="bg-light py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-0">© 2024 Agence Immobilière. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
