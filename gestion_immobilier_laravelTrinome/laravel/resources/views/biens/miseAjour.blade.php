<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mettre à jour un bien</title>

    <!-- Lien vers le fichier CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Barre de navigation -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Mettre à jour Bien</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Recherche</button>
            </form>
        </div>
    </nav>

    <!-- Affichage des messages d'erreur -->
    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
        @endforeach
    </ul>

    <!-- Conteneur principal -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Mettre à jour un bien</div>
                    <div class="card-body">
                        <!-- Formulaire pour mettre à jour le bien -->
                        <form action="{{ route('updateBien', $bien->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Utilisation de la méthode PUT pour la mise à jour -->

                            <!-- Champ pour le nom du bien -->
                            <div class="form-group">
                                <label for="nom">Nom du bien:</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="{{ $bien->nom }}" required>
                            </div>

                            <!-- Champ pour la description du bien -->
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $bien->description }}</textarea>
                            </div>

                            <!-- Champ pour l'adresse du bien -->
                            <div class="form-group">
                                <label for="adresse">Adresse:</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $bien->adresse }}" required>
                            </div>

                            <!-- Champ pour la catégorie du bien -->
                            <div class="form-group">
                                <label for="categorie">Catégorie:</label>
                                <select class="form-control" id="categorie" name="categorie" required>
                                    <option value="luxe" {{ $bien->categorie == 'luxe' ? 'selected' : '' }}>Luxe</option>
                                    <option value="moyenne" {{ $bien->categorie == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
                                    <option value="economie" {{ $bien->categorie == 'economie' ? 'selected' : '' }}>Economie</option>
                                </select>
                            </div>

                            <!-- Champ pour le statut du bien -->
                            <div class="form-group">
                                <label for="statut">Statut:</label>
                                <select class="form-control" id="statut" name="statut" required>
                                    <option value="occupe" {{ $bien->statut == 'occupe' ? 'selected' : '' }}>Occupé</option>
                                    <option value="libre" {{ $bien->statut == 'libre' ? 'selected' : '' }}>Libre</option>
                                </select>
                            </div>

                            <!-- Champ pour la date d'ajout du bien -->
                            <div class="form-group">
                                <label for="date_ajout">Date:</label>
                                <input type="date" class="form-control" id="date_ajout" name="date_ajout" value="{{ (new \DateTime($bien->date_ajout))->format('Y-m-d') }}" required>                            </div>

                            <!-- Champ pour l'image du bien -->
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                @if ($bien->image)
                                    <!-- Affichage de l'image actuelle -->
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/' . $bien->image) }}" alt="Image actuelle" width="100">
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="admin_id">Admin ID:</label>
                                <input type="text" class="form-control" id="admin_id" name="admin_id" value="1" readonly>
                            </div>
                            <!-- Bouton pour soumettre le formulaire -->
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclusion des fichiers JavaScript nécessaires pour Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
