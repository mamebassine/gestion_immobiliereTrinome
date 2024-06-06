<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agence Immobilière</title>
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
                <div class="collapse navbar-collapse" id="navbarNav" style="text-align: center;">
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
                            <a class="nav-link" href="{{ route('pageConnexion') }}">Connexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
     <!-- Carrousel -->
     <style>
        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
    </style>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1505576391880-b3f9d713dc4f?q=80&w=1870&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1508361807109-f6c99168c61d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fG1haXNvbiUyMGFmcmlxdWV8ZW58MHx8MHx8fDA%3D" class="d-block w-100" alt="Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


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
                                {{-- <a href="{{ route('editerBien', $bien->id) }}" class="btn btn-sm btn-outline-warning">Modifier</a> --}}
                            </div>
                            {{-- <form action="{{ route('supprimerBien', $bien->id) }}" method="POST" class="d-inline mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">Supprimer</button>
                            </form> --}}
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
