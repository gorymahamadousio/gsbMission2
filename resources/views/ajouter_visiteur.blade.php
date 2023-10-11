@extends ('sommaire')
    @section('contenu1')
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
                  <form action="{{chemin_ajouter}}" method="POST">
                    @csrf
                  <div class="mb-3">
                     <input type="text" class="form-control" name="id" placeholder="id">

                      <input type="text" class="form-control" name="nom" placeholder="Nom du visiteur">

                      <input type="text" class="form-control" name="prenom" placeholder="Prenom du visiteur">

                      <input type="text" class="form-control" name="login" placeholder="Login du visiteur">

                      <input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
                      
                      <input type="text" class="form-control" name="adresse" placeholder="adresse du visiteur">

                      <input type="text" class="form-control" name="cp" placeholder="code postal du visiteur">

                      <input type="text" class="form-control" name="ville" placeholder="Ville du visiteur">

                      <input type="date" class="form-control" name="dateEmbauche" placeholder="date d'embauche du visiteur">
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                  </form>
                </div>
            </div>
@endsection 