@extends ('sommaire')
    @section('contenu1')
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
                                        <a href="{{ route('chemin_infosVisiteur', ['id'=>$visiteur['id'] ]) }}" class="btn btn-outline-info">update</a>
                                        <a href="{{ route('chemin_etas', ['id'=>$visiteur['id'] ]) }}" class="btn btn-outline-info">pdf</a>
                                        <a href="{{ route('chemin_deleteVisiteur', ['id'=>$visiteur['id'] ]) }}" class="btn btn-outline-danger" >supprimer</a>
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