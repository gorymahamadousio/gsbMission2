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
                  <form action="{{route('chemin_ajouterAction')}}" method="POST">
                    @csrf
                  <div class="mb-3">
                     <input type="text" class="form-control" name="id" placeholder="id"><br>

                      <input type="text" class="form-control" name="nom" placeholder="Nom du visiteur"><br>

                      <input type="text" class="form-control" name="prenom" placeholder="Prenom du visiteur"><br>

                      <input type="text" class="form-control" name="login" placeholder="Login du visiteur"><br>

                      <input type="password" class="form-control" name="mdp" placeholder="Mot de passe"><br>
                      
                      <input type="text" class="form-control" name="adresse" placeholder="adresse du visiteur"><br>

                      <input type="text" class="form-control" name="cp" placeholder="code postal du visiteur"><br>

                      <input type="text" class="form-control" name="ville" placeholder="Ville du visiteur"><br>

                      <input type="date" class="form-control" name="dateEmbauche" placeholder="date d'embauche du visiteur"><br>

                      <input type="date" class="form-control" name="typeUser" placeholder="type"><br>
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                  </form>
                </div>
            </div>
@endsection 