<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Application Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar bg-body-tertiary mt-10">
            <div class="container-fluid">
                <a class="navbar-brand">Accueil</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="container">
        @foreach($biens as $bien)
        <div class="card" style="width: 18rem; margin-bottom: 20px;">
            <img src="{{ asset('uploads/' . $bien->image) }}" class="card-img-top" alt="Image de {{$bien->nom}}">
            <div class="card-body">
                <h5 class="card-title">{{$bien->nom}}</h5>
                <p class="card-text">{{$bien->description}}</p>
                <br>
                <span>{{$bien->date_ajout}}</span>
                <a href="#" class="btn btn-primary">Plus d'information</a>
                <a href="{{ route('editerBien', $bien->id) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('supprimerBien', $bien->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">Supprimer</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
