@extends ('sommaire')
    @section('contenu1')
            <div class="container text-center">
                <div class="row">
                <h3>Modifier les information d'un visiteur</h3><hr>

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

                  <form action="{{ route('chemin_updateVisiteur')}}" method="POST">
                    @csrf
                  <div class="mb-3">
                    @foreach($findVisiteurs as $info)
                      <input type="text" class="form-control" name="nom" value="{{ $info['nom'] }}" placeholder="Nom du visiteur"><br>
                        
                      <input type="text" class="form-control" name="prenom" value="{{ $info['prenom'] }}" placeholder="Prenom du visiteur"><br>

                      <input type="text" class="form-control" name="login" value="{{ $info['login'] }}" placeholder="Login du visiteur"><br>
                      
                      <input type="text" class="form-control" name="adresse" value="{{ $info['adresse'] }}" placeholder="adresse du visiteur"><br>

                      <input type="text" class="form-control" name="cp" value="{{ $info['cp'] }}" placeholder="code postal du visiteur"><br>

                      <input type="text" class="form-control" name="ville" value="{{ $info['ville'] }}" placeholder="Ville du visiteur"><br>

                      <input type="date" class="form-control" name="dateEmbauche" value="{{ $info['dateEmbauche'] }}" placeholder="date d'embauche du visiteur">
                    @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Valider</button>
                  </form>
                </div>
            </div>
@endsection 