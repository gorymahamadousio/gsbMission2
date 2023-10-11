<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PdoGsb;

class gestionVisiteurController extends Controller
{
    //fonction qui va permettre l'affichage de la liste des visiteurs
    public function liste_visiteurs(){
        //trés important ont vérifie toujours que l'on a une session de l'utilisateur par sécuriter sinon on accéde pas au page du site(la session est crée quand l'utilisateur se connecte) 
        if( session('visiteur')!= null){

        $visiteur2 = session('visiteur');

        $listevisiteurs=PdoGsb::getVisiteurs();
        //dd($visiteurs);
        return view('liste_visiteurs')->with('listevisiteurs',$listevisiteurs)
                ->with('visiteur', $visiteur2);
                
        
    }
}

    //fonction qui va permettre d'ajouter un visiteur
    public function ajouter_visiteur(Request $request){
     
        //trés important ont vérifie toujours que l'on a une session de l'utilisateur par sécuriter sinon on accéde pas au page du site(la session est crée quand l'utilisateur se connecte) 
        if((session('visiteur')!=null)){
            //récupération des valeur avec la method request 
            $idvisiteur=htmlspecialchars($request['id']);
            $nom=htmlspecialchars($request['nom']);
            $prenom=htmlspecialchars($request['prenom']);
            $login=htmlspecialchars($request['login']);
            $mdp=htmlspecialchars($request['mdp']);
            $adresse=htmlspecialchars($request['adresse']);
            $cp=htmlspecialchars($request['cp']);
            $ville=htmlspecialchars($request['ville']);
            $dateEmbauche=htmlspecialchars($request['dateEmbauche']);
            //appelle de la fonction qui contient ma requête d'insertion depuis mon model
            $ajouter=PdoGsb::ajouterVisiteur($idvisiteur,$nom,$prenom,$login,$mdp,$adresse,$cp,$ville,$dateEmbauche);
            dd($ajouter);

            //on retourne la vue en question et on associe les valeurs qui vont lui être "imputée" avec le with
            return view('liste_visiteurs')->with('visiteurs',$visiteurs)
                 ->with('status','les infos ont étais enregistré avec succées');

        }
        
    }

    //récupération des infos que l'on souhaite 
    public function infosVisit(Request $request){
       
        if( (session('visiteur')!=null)){
            //récupération ID
            $visiteur = session('visiteur');
            $idvisiteur = $request['id'];
           //appelle de la fonctioon qui va afficher les infos d'un utilisateur
            $findVisiteurs=PdoGsb::getIdVisiteurs($idvisiteur);
            //dd($findVisiteurs);
            return view('update_visiteur')->with('findVisiteurs',$findVisiteurs)
                    ->with('visiteur', $visiteur);
           
        }else{
        echo'erreur';
        }

    }


    public function update_visiteur(Request $request){

        //on vérifie si la session existe
        if(session('visiteur'!=null)){

            $nom=htmlspecialchars($request['nom']);
            $prenom=htmlspecialchars($request['prenom']);
            $login=htmlspecialchars($request['login']);
            $adresse=htmlspecialchars($request['adresse']);
            $cp=htmlspecialchars($request['cp']);
            $ville=htmlspecialchars($request['ville']);
            $dateEmbauche=htmlspecialchars($request['dateEmbauche']);
            //appelle de la fonction depuis le model
            updateVisiteur($nom,$prenom,$login,$adresse,$cp,$ville,$dateEmbauche);

            return view('update_visiteurs')->with('visiteurs',$visiteurs)
            ->with('status','les infos ont étet enregistré avec succées');

        }

    }


}