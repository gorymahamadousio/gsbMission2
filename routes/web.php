<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
        /*-------------------- Use case connexion---------------------------*/
Route::get('/',[
        'as' => 'chemin_connexion',
        'uses' => 'connexionController@connecter'
]);

Route::post('/',[
        'as'=>'chemin_valider',
        'uses'=>'connexionController@valider'
]);
Route::get('deconnexion',[
        'as'=>'chemin_deconnexion',
        'uses'=>'connexionController@deconnexion'
]);

         /*-------------------- Use case état des frais---------------------------*/
Route::get('selectionMois',[
        'as'=>'chemin_selectionMois',
        'uses'=>'etatFraisController@selectionnerMois'
]);

Route::post('listeFrais',[
        'as'=>'chemin_listeFrais',
        'uses'=>'etatFraisController@voirFrais'
]);

        /*-------------------- Use case gérer les frais---------------------------*/

Route::get('gererFrais',[
        'as'=>'chemin_gestionFrais',
        'uses'=>'gererFraisController@saisirFrais'
]);

Route::post('sauvegarderFrais',[
        'as'=>'chemin_sauvegardeFrais',
        'uses'=>'gererFraisController@sauvegarderFrais'
]);

Route::get('test',[
        'as'=>'chemin_test',
        'uses'=>'etatFraisController@test'
]);


//route qui redirige vers mon controller gestionVisiteurController et va pointer sur la fonction concernée
Route::get('visiteurs',[
        'as'=>'chemin_visiteurs',
        'uses'=>'gestionVisiteurController@liste_visiteurs'
]);

Route::get('lstvisiteurs',[
        'as'=>'chemin_visiteurs_simple',
        'uses'=>'gestionVisiteurController@liste_visiteurs_simple'
]);


Route::get('ajouterVisiteur',[ 
        'as'=>'chemin_ajouter',
        'uses'=>'gestionVisiteurController@ajouter_visiteur'
]);

Route::post('ajouterVisiteurAction',[ 
        'as'=>'chemin_ajouterAction',
        'uses'=>'gestionVisiteurController@ajouter_visiteurAction'
]);


Route::get('infosVisiteurModif',[ 
        'as'=>'chemin_infosVisiteur',
        'uses'=>'gestionVisiteurController@infosVisitModif'
]);

Route::post('updateVisiteur',[ 
        'as'=>'chemin_updateVisiteur',
        'uses'=>'gestionVisiteurController@update_visiteur'
]);



Route::get('deleteVisiteur',[ 
        'as'=>'chemin_deleteVisiteur',
        'uses'=>'gestionVisiteurController@delete_visiteur'
]);

Route::get('etas',[ 
        'as'=>'chemin_etas',
        'uses'=>'gestionVisiteurController@etas_visiteur'
]);

Route::get('valideFrais',[ 
        'as'=>'chemin_valideFrais',
        'uses'=>'gestionVisiteurController@valide_frais'
]);

Route::post('voirValideFrais',[ 
        'as'=>'chemin_voirValideFrais',
        'uses'=>'gestionVisiteurController@voir_valide_frais'
]);