<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PdoGsb;

class gestionVisiteurController extends Controller
{
    //
    public function liste_visiteurs(){
        $visiteurs=PdoGsb::getVisiteurs();
        return view('liste_visiteurs')->with('visiteurs',$visiteurs);
        
        //,compact('visiteurs'));
        
        
}

    public function ajouter_visiteurs(Request $request){
       
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required ',
        ]);

        $visiteur= new PdoGsb();
        $visiteur->nom=$request->nom;
        $visiteur->prenom=$request->prenom;
        $visiteur->save();

        return header('location: /ajouter')->with('status',"Le visiteur à bien été enregistrer");

        
    }


}