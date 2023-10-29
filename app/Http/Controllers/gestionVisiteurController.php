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

    //récupération des infos que l'on souhaite 
    public function ajouter_Visiteur(){
       
        if( (session('visiteur')!=null)){
            //récupération ID
            $visiteur = session('visiteur');
            return view('ajouter_visiteur')->with('visiteur', $visiteur);

        }else{
        echo'erreur';
        }

    }



    //fonction qui va permettre d'ajouter un visiteur
    public function ajouter_visiteurAction(Request $request){
     
        //trés important ont vérifie toujours que l'on a une session de l'utilisateur par sécuriter sinon on accéde pas au page du site(la session est crée quand l'utilisateur se connecte) 
        if((session('visiteur')!=null)){

            //on va genérer un id aléatoire
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Lettres possibles
            $nbr = '0123456789'; // Chiffres possibles
            
            $randomID = $characters[rand(0, strlen($characters) - 1)]; // Choisis une lettre aléatoire
            
            // Ajoute 3 chiffres aléatoires
            for ($i = 0; $i <3; $i++) {
                $randomID .= $nbr[rand(0, strlen($nbr) - 1)];
            }
            
            //récupération des valeur avec la method request 
            $idvisiteur=$randomID;
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
            //on revien à la mliste des visiteur une fois l'ajout effectuer
            $visiteur2 = session('visiteur');
            $listevisiteurs=PdoGsb::getVisiteurs();

            //on retourne la vue en question et on associe les valeurs qui vont lui être "imputée" avec le with;
            return view('liste_visiteurs')->with('listevisiteurs',$listevisiteurs)
                        ->with('visiteur', $visiteur2);
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
    

    //récupération des infos que l'on souhaite afin d'afficher son etas
    public function etas_visiteur(Request $request){
    
        if( (session('visiteur')!=null)){
            //récupération ID
            $visiteur = session('visiteur');
            $idvisiteur = $request['id'];
            //appelle de la fonctioon qui va afficher les infos d'un utilisateur
            $findVisiteurs=PdoGsb::getIdVisiteurs($idvisiteur);
            //dd($findVisiteurs);
            return view('etas_visiteur')->with('findVisiteurs',$findVisiteurs)
                    ->with('visiteur', $visiteur);
            
        }else{
        echo'erreur';
        }

    }

    //récupération des infos que l'on souhaite afin d'afficher son etas
    public function confirmation(Request $request){

        if( (session('visiteur')!=null)){
            //récupération ID
            $visiteur = session('visiteur');
            $idvisiteur = $request['id'];
            //appelle de la fonctioon qui va afficher les infos d'un utilisateur
            $findVisiteurs=PdoGsb::getIdVisiteurs($idvisiteur);
            //dd($findVisiteurs);
            return view('confirmation')->with('findVisiteurs',$findVisiteurs)
                    ->with('visiteur', $visiteur);
            
        }else{
        echo'erreur';
        }

    }


    public function update_visiteur(Request $request){

        //on vérifie si la session existe
        if((session('visiteur')!=null)){
            
            $idvisiteur=$request['id'];
            $nom=htmlspecialchars($request['nom']);
            $prenom=htmlspecialchars($request['prenom']);
            $login=htmlspecialchars($request['login']);
            $adresse=htmlspecialchars($request['adresse']);
            $cp=htmlspecialchars($request['cp']);
            $ville=htmlspecialchars($request['ville']);
            $dateEmbauche=htmlspecialchars($request['dateEmbauche']);
          
            //appelle de la fonction depuis le model
            $maj=PdoGsb::updateVisiteur($idvisiteur,$nom,$prenom,$login,$adresse,$cp,$ville,$dateEmbauche);
            
            //on revien à la mliste des visiteur une fois la maj effectuer
            $visiteur2 = session('visiteur');
            $listevisiteurs=PdoGsb::getVisiteurs();

            //on retourne la vue en question et on associe les valeurs qui vont lui être "imputée" avec le with;
            return view('liste_visiteurs')->with('listevisiteurs',$listevisiteurs)
                        ->with('visiteur', $visiteur2);
            } 
        }


        //suppresion d'un utilisateur
        public function delete_visiteur(Request $request){
       
        if( (session('visiteur')!=null)){

            $idvisiteur = $request['id'];
           //appelle de la fonctioon qui va supprimer le visiteur
            $suppFF=PdoGsb::deleteVisiteurFF($idvisiteur);
            $supprimer=PdoGsb::deleteVisiteur($idvisiteur);
           
            //on revien à la mliste des visiteur une fois la maj effectuer
            $visiteur2 = session('visiteur');
            $listevisiteurs=PdoGsb::getVisiteurs();

            //on retourne la vue en question et on associe les valeurs qui vont lui être "imputée" avec le with;
            return view('liste_visiteurs')->with('listevisiteurs',$listevisiteurs)
                        ->with('visiteur', $visiteur2);
           
        }else{
        echo'erreur lors de la suppression';
        }

    }


        //séléctions du mois et du visiteur concerner (pour afficher ses frais)
        public function valide_frais(){
       
            if( (session('visiteur')!=null)){
                //récupération  session visiteur
                $visiteur = session('visiteur');
                $idVisiteur = $visiteur['id'];
                //appelle de la fonction qui va permettre d'afficher les mois
                $lesMois = PdoGsb::getLesMoisDisponibles($idVisiteur);
                //infos des visiteur
                $infosVisiteur=PdoGsb::getVisiteurs();

                return view('valide_frais')->with('visiteur', $visiteur)
                                        ->with('lesMois', $lesMois)
                                        ->with('infosVisiteur', $infosVisiteur);
            }
        }

        //affichage des frais a valider
        public function voir_valide_frais(){

            if( (session('visiteur')!=null)){
                //récupération des valeurs
                $visiteur = session('visiteur');
                $idVisiteur = $request['id'];
                $Mois = $request['lstMois']; 

                //fonction qui va afficher les frais
                $frais=getFraisMois($idVisiteur,$mois);

                return view('voirValideFrais')->with('visiteur', $visiteur)
                ->with('frais', $frais);
                
    
            }
        }

}


