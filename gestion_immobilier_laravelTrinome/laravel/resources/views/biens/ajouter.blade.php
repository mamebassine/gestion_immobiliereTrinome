<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un bien</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Ajouter Bien</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Recherche</button>
            </form>
        </div>
    </nav>
    <ul>
        @foreach ($errors->all() as $error) <!-- Boucle à travers toutes les erreurs -->
                <li class="alert alert-danger">{{$error}}</li>
        @endforeach
        </ul>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ajouter un bien</div>
                    <div class="card-body">
                        <form action="{{route('traitementBien')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom du bien:</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du bien" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description du bien" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse:</label>
                                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse du bien" required>
                            </div>
                            <div class="form-group">
                                <label for="categorie">Catégorie:</label>
                                <select class="form-control" id="categorie" name="categorie" required>
                                    <option value="luxe">Luxe</option>
                                    <option value="moyenne">Moyenne</option>
                                    <option value="economie">Economie</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="statut">Statut:</label>
                                <select class="form-control" id="statut" name="statut" required>
                                    <option value="occupe">Occupé</option>
                                    <option value="libre">Libre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_ajout">Date et heure d'ajout:</label>
                                <input type="datetime-local" class="form-control" id="date_ajout" name="date_ajout" value="{{ \Carbon\Carbon::now()->format('Y-m-d\TH:i') }}" required>
                            </div>
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <label for="admin_id">Admin ID:</label>
                                <input type="text" class="form-control" id="admin_id" name="admin_id" value="1" readonly>
                            </div>

                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
