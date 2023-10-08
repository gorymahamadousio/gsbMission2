@extends ('sommaire')
    @section('contenu1')
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Visiteurs</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body>

            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <h1>Liste des Visiteurs</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($visiteurs as $visiteur)
                                <tr>
                                    <td>{{ $visiteur['id'] }}</td>
                                    <td>{{ $visiteur['nom'] }}</td>
                                    <td>{{ $visiteur['prenom' ]}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary">update</a>
                                        <a href="" class="btn btn-info">étas</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><hr>
                        <a href="/ajouter" class="btn btn-secondary">Ajouter</a>
                                    
                    
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        </body>
        </html>
@endsection 