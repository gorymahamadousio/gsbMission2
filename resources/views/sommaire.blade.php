@extends ('modeles/visiteur')
    @section('menu')
            <!-- Division pour le sommaire -->
        <div id="menuGauche">
            <div id="infosUtil">
                  
             </div>  
               <ul id="menuList">
               @isset($gestionnaire)
                <li>
                  <strong>Bonjour {{ $gestionnaire['nom'] . ' ' . $gestionnaire['prenom'] }}</strong>
                </li>
                <li class="smenu">
                  <a href="{{ route('chemin_liste_visiteurs') }}" title="gerer les visiteurs">Gérer les visiteurs</a>
                </li>
                <li class="smenu">
                  <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>
                </li>
              @else
                @isset($visiteur)
                  <li>
                    <strong>Bonjour {{ $visiteur['nom'] . ' ' . $visiteur['prenom'] }}</strong>
                  </li>
                  <li class="smenu">
                    <a href="{{ route('chemin_selectionMois') }}" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
                  </li>
                  <li class="smenu">
                    <a href="{{ route('chemin_gestionFrais')}}" title="Saisie fiche de frais ">Saisie fiche de frais</a>
                  </li>
                  <li class="smenu">
                    <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>
                  </li>
                @endisset
              @endisset


                
                @isset($comptable)
                    <li >
                        <strong>Bonjour {{ $comptable['nom'] . ' ' . $comptable['prenom'] }}</strong>
                    </li>
                    <li class="smenu">
                      <a href="{{ route('chemin_valideFrais') }}" title="gerer les frais visiteurs">valider frais</a>
                    </li>
                    <li class="smenu">
                      <a href="{{ route('chemin_deconnexion') }}" title="Se déconnecter">Déconnexion</a>
                    </li>
                    @endisset
                </ul>
               
        </div>
@endsection          