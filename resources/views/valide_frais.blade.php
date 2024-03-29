@extends ('sommaire')
    @section('contenu1')
      <div id="contenu">
        <h3>Mes fiches de frais a valider</h3>
      <form action="{{ route('chemin_voirValideFrais') }}" method="post">
        {{ csrf_field() }} <!-- laravel va ajouter un champ caché avec un token -->
        <div class="corpsForm align-item-center">
        <label for="visiteur" >Visiteur : </label>
          <select id="visiteur" name="id">
              @foreach($infos as $info)
                    <option selected value="{{ $info['id'] }}">
                      {{ $info['nom']}}  {{$info['prenom'] }} 
                    </option>
              @endforeach
          </select> </br>
          <label for="lstMois" >Mois : </label>
          <select id="lstMois"class="align-item-center" name="lstMois">
          @foreach($lesMois as $mois)
                    <option selected value="{{ $mois['mois'] }}">
                      {{ $mois['mois']}}
                    </option>
              @endforeach
          </select>
        </div>
        <div class="piedForm align-item-center">
          <input id="ok" type="submit" value="Valider" size="20" />
          <input id="annuler" type="reset" value="Effacer" size="20" />
        </div>
        </form>
  @endsection 