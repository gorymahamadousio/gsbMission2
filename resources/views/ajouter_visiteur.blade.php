@extends ('sommaire')
    @section('contenu1')
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Visiteurs</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body>
            <div class="container text-center">
                <div class="row">
                <h3>Ajouter un visiteur</h3><hr>

                @if(session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif
                <ul>
                   @foreach($errors->all() as $error)
                    <li class="alert alert-success">{{$error}}</li>
                   @endforeach
                </ul>
                  <form action="/ajouter_visiteur" method="POST">
                    @csrf
                  <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Nom du visiteur">

                      <input type="text" class="form-control" placeholder="Prenom du visiteur">

                      <input type="text" class="form-control" placeholder="Login du visiteur">

                      <input type="text" class="form-control" placeholder="adresse du visiteur">

                      <input type="text" class="form-control" placeholder="code postal du visiteur">

                      <input type="text" class="form-control" placeholder="Ville du visiteur">

                      <input type="date" class="form-control" placeholder="date d'embauche du visiteur">
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                  </form>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
        </html>
@endsection 