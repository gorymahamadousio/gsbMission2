<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PdoGsb;

class connexionController extends Controller
{
    function connecter(){
        
        return view('connexion')->with('erreurs',null);
    } 


    function valider(Request $request){
        $login = $request['login'];
        $mdp = $request['mdp'];

        $visiteur = PdoGsb::getInfosVisiteur($login,$mdp);
        $gestionnaire = $visiteur;
        $comptable = $visiteur;

        if(!is_array($visiteur)){
            $erreurs[] = "Login ou mot de passe incorrect(s)";
            return view('connexion')->with('erreurs',$erreurs);
        //si la la colonne typeUser est egal à 1(soit visiteur) alors on se connecte avec une session visiteur
        }else if($visiteur['typeUser']==1){
            
            session(['visiteur' => $visiteur]);
            return view('sommaire')->with('visiteur',session('visiteur'));
        
        }else if($gestionnaire['typeUser']==2){

            session(['gestionnaire' => $gestionnaire]);
            return view('sommaire')->with('gestionnaire',session('gestionnaire'));

        }else if($comptable['typeUser']==3){
            
            session(['comptable' => $comptable]);
            return view('sommaire')->with('comptable',session('comptable'));
    } 

}


    function deconnexion(Request $request){

            $visiteur=session('visiteur');
            $gestionnaire=session('gestionnaire');
            $compatable=session('comptable');

           if(isset($visiteur)) {

            session(['visiteur' => null]);
            return redirect()->route('chemin_connexion');

           }
           else if($compatable){
            session(['comptable' => null]);
            return redirect()->route('chemin_connexion');
            
           }else{
            
            session(['gestionnaire' => null]);
            return redirect()->route('chemin_connexion');

           }
    }
           
}
       

