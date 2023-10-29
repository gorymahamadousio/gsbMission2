@extends ('sommaire')
    @section('contenu1')
            <div class="container text-center">
            <h3>êtes vous sûre de vouloir supprimer cette utilisateur</h3><br><br>
                <div class="text-center">
                    <a href="{{ route('chemin_deleteVisiteur', ['id'=>$visiteur['id']])}}" class="btn btn-primary">confirmer</a></br><br>
                    <a href="{{ route('chemin_visiteurs') }}" class="btn btn-info">annuler</a>
                </div>
            </div>
@endsection 