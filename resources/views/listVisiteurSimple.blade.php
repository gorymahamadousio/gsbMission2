@extends ('sommaire')
    @section('contenu1')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
                               @foreach($listevisiteurs as $visiteur)
                                <tr>
                                    <td>{{ $visiteur['id'] }}</td>
                                    <td>{{ $visiteur['nom'] }}</td>
                                    <td>{{ $visiteur['prenom' ]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><hr>
                    </div>
                </div>
            </div>
@endsection 