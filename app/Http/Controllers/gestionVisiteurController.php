<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PdoGsb;

class gestionVisiteurController extends Controller
{
    //fonction qui va permettre l'affichage de la liste des visiteurs
    public function liste_visiteurs(){
            //trés important ont vérifie toujours que l'on a une session de l'utilisateur par sécuriter sinon on accéde pas au page du site(la session est crée quand l'utilisateur se connecte) 
            if( session('gestionnaire')!= null){

            $gestionnaire = session('gestionnaire');

            $listevisiteurs=PdoGsb::getVisiteurs();
            return view('liste_visiteurs')->with('listevisiteurs',$listevisiteurs)
                    ->with('gestionnaire', $gestionnaire);
        }
    }

        //fonction qui va permettre l'affichage de la liste des visiteurs
        public function liste_visiteurs_simple(){
            //trés important ont vérifie toujours que l'on a une session de l'utilisateur par sécuriter sinon on accéde pas au page du site(la session est crée quand l'utilisateur se connecte) 
            if( session('comptable')!= null){

            $comptable = session('comptable');

            $listevisiteurs=PdoGsb::getVisiteurs();
            //dd($visiteurs);
            return view('listVisiteurSimple')->with('listevisiteurs',$listevisiteurs)
                    ->with('comptable', $comptable);
        }
    }

    //récupération des infos que l'on souhaite 
    public function ajouter_Visiteur(){
       
        if( (session('gestionnaire')!=null)){
            //récupération ID
            $gestionnaire = session('gestionnaire');
            return view('ajouter_visiteur')->with('gestionnaire', $gestionnaire);

        }else{
        echo'erreur';
        }

    }



    //fonction qui va permettre d'ajouter un visiteur
    public function ajouter_visiteurAction(Request $request){
     
        //trés important ont vérifie toujours que l'on a une session de l'utilisateur par sécuriter sinon on accéde pas au page du site(la session est crée quand l'utilisateur se connecte) 
        if((session('gestionnaire')!=null)){

            //on va genérer un id aléatoire
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; // Lettres possibles
            $nbr = '0123456789'; // Chiffres possibles
            
            $randomID = $characters[rand(0, strlen($characters) - 1)]; // Choisis une lettre aléatoire
            
            // Ajoute 3 chiffres aléatoires
            for ($i = 0; $i <2; $i++) {
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
            $gestionnaire = session('gestionnaire');
            $listevisiteurs=PdoGsb::getVisiteurs();

            //on retourne la vue en question et on associe les valeurs qui vont lui être "imputée" avec le with;
            return view('liste_visiteurs')->with('listevisiteurs',$listevisiteurs)
                        ->with('gestionnaire', $gestionnaire);
        }
        
    }

    //récupération des infos que l'on souhaite afin de les modifier
    public function infosVisitModif(Request $request){
       
        if( (session('gestionnaire')!=null)){
            //récupération ID
            $gestionnaire = session('gestionnaire');
            $idvisiteur = $request['id'];
           //appelle de la fonctioon qui va afficher les infos d'un utilisateur
            $findVisiteurs=PdoGsb::getIdVisiteurs($idvisiteur);
            //dd($findVisiteurs);
            return view('update_visiteur')->with('findVisiteurs',$findVisiteurs)
                    ->with('gestionnaire', $gestionnaire)
                    ->with('idvisiteur', $idvisiteur);

           
        }else{
        echo'erreur';
        }

    }
    

    //récupération des infos que l'on souhaite afin d'afficher son etas
    public function etas_visiteur(Request $request){
    
        if( (session('gestionnaire')!=null)){
            //récupération ID
            $gestionnaire = session('gestionnaire');
            $idvisiteur = $request['id'];
            $listevisiteurs=PdoGsb::getVisiteurs();
            //appelle de la fonction qui va afficher les infos d'un utilisateur
            $findVisiteurs=PdoGsb::getIdVisiteurs($idvisiteur);
            //dd($findVisiteurs);
            return view('etas_visiteur')->with('findVisiteurs',$findVisiteurs)
                    ->with('gestionnaire', $gestionnaire);
            
        }else{
        echo'erreur';
        }

    }


    public function update_visiteur(Request $request){

        //on vérifie si la session existe
        if((session('gestionnaire')!=null)){
            
            $gestionnaire = session('gestionnaire');
            $idvisiteur=$request['id'];
            //dd($idvisiteur);
            $nom=htmlspecialchars($request['nom']);
            $prenom=htmlspecialchars($request['prenom']);
            $login=htmlspecialchars($request['login']);
            $adresse=htmlspecialchars($request['adresse']);
            $cp=htmlspecialchars($request['cp']);
            $ville=htmlspecialchars($request['ville']);
            $dateEmbauche=htmlspecialchars($request['dateEmbauche']);
          
            //appelle de la fonction depuis le model
            $maj=PdoGsb::updateVisiteur($idvisiteur,$nom,$prenom,$login,$adresse,$cp,$ville,$dateEmbauche);
            var_dump($maj);
            //on revien à la liste des visiteur une fois la maj effectuer
            $listevisiteurs=PdoGsb::getVisiteurs();
            echo 'carré';
            //on retourne la vue en question et on associe les valeurs qui vont lui être "imputée" avec le with;
            return view('liste_visiteurs')->with('listevisiteurs',$listevisiteurs)
                        ->with('gestionnaire', $gestionnaire);
                        
            }else echo "erreur";
        }


        //suppresion d'un utilisateur
        public function delete_visiteur(Request $request){
       
        if( (session('gestionnaire')!=null)){

            $gestionnaire = session('gestionnaire');

            $idvisiteur = $request['id'];
           //appelle de la fonctioon qui va supprimer le visiteur
           $suppLi=PdoGsb::deleteLigneFrais($idvisiteur);
           $suppFF=PdoGsb::deleteVisiteurFF($idvisiteur);
            $supprimer=PdoGsb::deleteVisiteur($idvisiteur);
           
            //on revien à la liste des visiteur une fois la maj effectuer
            $listevisiteurs=PdoGsb::getVisiteurs();
            

            //on retourne la vue en question et on associe les valeurs qui vont lui être "imputée" avec le with;
            return view('liste_visiteurs')->with('gestionnaire', $gestionnaire)
                    ->with('listevisiteurs',$listevisiteurs)
                    ->with('supprimer', $supprimer);
           
        }else{
        echo'erreur lors de la suppression';
        }

    }


        //séléctions du mois et du visiteur concerner (pour afficher ses frais)
        public function valide_frais(){
       
            if( (session('comptable')!=null)){
                //récupération  session visiteur
                $comptable = session('comptable');
                $idVisiteur = $comptable['id'];
                //infos des visiteur
                $infos=PdoGsb::getVisiteurs();
                //appelle de la fonction qui va permettre d'afficher les mois
                $lesMois = PdoGsb::getLesMoisDisponibles($idVisiteur);


                return view('valide_frais')->with('comptable', $comptable)
                                        ->with('lesMois', $lesMois)
                                        ->with('infos', $infos);
                                        
            }
        }

        //affichage des frais a valider
        public function voir_valide_frais(Request $request){

            if( (session('comptable')!=null)){

                
                
                //récupération des valeurs
                $comptable = session('comptable');
                $idVisiteur = $request['id'];
                $mois = $request['lstMois']; 

                //fonction qui va afficher les frais
                $frais=pdoGsb::getFraisMois($idVisiteur,$mois);
                dd($frais);
                return view('voirValideFrais')->with('comptable', $comptable)
                ->with('frais', $frais);
                
    
            }
        }

}


