
@extends ('sommaire')
    @section('contenu1')
            <div class="container text-center">
                <div class="row">
                  <h3>Etas d'un visiteur</h3><hr>
                </div>

                    @foreach($findVisiteurs as $info)
                    <div class="row text-center">
                      <div class="col-4 fst-italic">
                        <p class="fw-bolder">Nom: {{ $info['nom'] }}</p>
                      </div>
                      <div class="col-4 fst-italic">
                      <p class="fw-bolder">Prénom: {{ $info['prenom'] }}</p>
                      </div>
                    </div><br>

                    <div class="row text-center">
                      <div class="col-4 fst-italic">
                        <p class="fw-bolder">Login: {{ $info['login'] }}</p>
                      </div>
                      <div class="col-4 fst-italic">
                        <p class="fw-bolder">Adresse: {{ $info['adresse'] }}</p>
                      </div>
                    </div><br>

                    <div class="row text-center">
                      <div class="col-4 fst-italic">
                        <p class="fw-bolder">Code postal: {{ $info['cp'] }}</p>
                      </div>
                      <div class="col-4 fst-italic">
                      <p class="fw-bolder">Ville: {{ $info['ville'] }}</p>
                      </div>
                    </div><br>

                    <div class="row text-center">
                      <div class="col-4 fst-italic">
                        <p class="fw-bolder">Date d'enbauche: {{ $info['dateEmbauche'] }}</p>
                      </div>
                    </div><br>
                  @endforeach

                    <button type="submit" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
  @endsection 