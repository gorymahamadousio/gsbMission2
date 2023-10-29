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
                                    <td>
                                        <a href="{{ route('chemin_infosVisiteur', ['id'=>$visiteur['id']])}}" class="btn btn-primary">update</a>
                                        <a href="{{ route('chemin_etas', ['id'=>$visiteur['id']])}}" class="btn btn-info">étas</a>
                                        <a href="{{ route('chemin_confirmation', ['id'=>$visiteur['id']])}}" class="btn btn-danger" onclick="confirm()">supprimer</a>
                                        <script> 
                                            function confirm() {
                                                   // let rep = prompt("Êtes-vous sûr de vouloir supprimer cet utilisateur ? (O/N)");
                                                    
                                                 /*   if (rep === "o" || rep === "O") {
                                                        // L'utilisateur a confirmé, rediriger vers la route de suppression
                                                        location.href = "{{ route('chemin_deleteVisiteur', ['id' => $visiteur['id']]) }}";
                                                        alert('Vous avez confirmé la suppression.');
                                                    } else if (rep === "n" || rep === "N") {
                                                        // L'utilisateur a annulé, rediriger vers la liste des visiteurs
                                                        location.href = "{{ route('chemin_visiteurs') }}";
                                                        alert("Vous avez décidé de ne pas supprimer le visiteur.");
                                                    } else {
                                                        // Si la réponse n'est pas valide, rediriger vers la liste des visiteurs
                                                        location.href = "{{ route('chemin_visiteurs') }}";
                                                        alert("Réponse invalide. Vous avez décidé de ne pas supprimer le visiteur.");
                                                    }*/
                                                }
                                        </script>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><hr>
                       
                        <a href="{{ route('chemin_ajouter')}}" class="btn btn-secondary">Ajouter</a>
                                    
                    
                    </div>
                </div>
            </div>
@endsection 