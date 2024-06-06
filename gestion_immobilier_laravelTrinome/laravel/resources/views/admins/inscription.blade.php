<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <ul>
        @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
        @endforeach
        </ul>
    <div class="container">
        <h2>Inscription</h2>
        <form action="{{route('enregistrer_admin')}}" method="POST" class="mt-4">
            @csrf

            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom">
            </div>

                <div class="form-group">
                    <label for="adresse">Adresse :</label>
                    <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrez votre adresse">
                </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" class="form-control" id="mot_passe" name="mot_passe" placeholder="Entrez votre mot de passe">
            </div>
            <div class="form-group">
                <label for="confirmer_mot_de_passe">Confirmer le mot de passe :</label>
                <input type="password" class="form-control" id="confirmer_mot_de_passe" name="mot_passe_confirmation" placeholder="Confirmez votre mot de passe">
            </div>


            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
