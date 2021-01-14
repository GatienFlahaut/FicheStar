<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Identite;
use App\Models\Photo;
use Illuminate\Http\Response;
use Illuminate\Http\File;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class IdentiteController extends Controller
{

    //Permet d'enregistre une nouvelle fiche
    public function store(Request $request)
	{			
        //vérifie les données du formulaire
        $validatedData = $request->validate([
            'nom_star' => ['required'],
            'prenom_star' => ['required'],
            'description_star' => ['required'],
            'photo_star' => ['required'],
        ]);
        
        //création de la fiche dans les tables identites et photos (par la suite)
        $identite = Identite::create([
            'nom' => $request->nom_star,
            'prenom' => $request->prenom_star,
            'description' => $request->description_star,
        ]);
        
        //permet d'enregistrer les images dans le dossier public/storage/images
        //nécessite de faire le lien au début avec :" php artisan storage:link "
        $photo_star = $request->photo_star;
        Storage::putFileAs('./public/images', $photo_star, $request->prenom_star . '-' . $request->nom_star . '.' . $photo_star->guessExtension());
        $savePhoto =  $request->prenom_star . '-' . $request->nom_star . '.' . $photo_star->guessExtension();

        $photo_creation = Photo::create([
            'fk_identite_id' => $identite->id,
            'url_photo' => $savePhoto, 
        ]);

        //Données nécessaires pour la vue
        $stars = self::listeDesStars();
        $confirmation = "Votre fiche a bien été ajoutée";
        $data = array(                                                          
            'stars' => $stars,                
            'confirmation' => $confirmation,                
        );

        return view('back/home')->with($data);

        
    }


    //permet d'afficher la liste (back office)
    public function index()
    {
        $stars = self::listeDesStars();
        $data = array(                                                          
            'stars' => $stars,                 
        );
        return view('back/home')->with($data);
    }


    //permet d'afficher la liste (front office versions PC/mobiles)
    public function show(Request $request)
    {
      
        $stars = self::listeDesStars();
        $data = array(                                                          
            'stars' => $stars,                              
        );

        //vérifie le nom de domaine afin de retourner la version mobile ou desktop
        if(($_SERVER['HTTP_HOST']) == "mob.fiche-star"){
            return view('/mobile/star')->with($data);
        }
        else{
            return view('/star')->with($data);
        };

    }


    //Mise à jour d'une fiche (back office)
    public function update(Request $request)
    {
        $validatedData = $request->validate([
             'modif_nom_star' => ['required'],
             'modif_prenom_star' => ['required'],
             'modif_description_star' => ['required'],
             'modif_photo_star' => ['nullable'],
             'modif_star_id' => ['required']
         ]);

        //récupère les données de la BDD en fonction de l'id et les remplace
        $identite = Identite::find($request->modif_star_id);
        $identite->prenom = $request->modif_prenom_star;
        $identite->nom = $request->modif_nom_star;
        $identite->description = $request->modif_description_star;
        
         if(isset($request->modif_photo_star)){
            
            $photo_star = $request->modif_photo_star;
            Storage::putFileAs('./public/images', $photo_star, $request->modif_prenom_star . '-' . $request->modif_nom_star . '.' . $photo_star->guessExtension());
            $savePhoto =  $request->modif_prenom_star . '-' . $request->modif_nom_star . '.' . $photo_star->guessExtension();

            $photo_creation = Photo::create([
                'fk_identite_id' => $identite->id,
                'url_photo' => $savePhoto, 
            ]);
        }

        //sauvegarde les changements
        $identite->save();
        $stars = self::listeDesStars();
        $modification = "Votre fiche a bien été mis à jour";
        $data = array(                                                          
            'stars' => $stars,                
            'modification' => $modification,                
        );
        return redirect('/back/index_fiche')->with('modification', 'Votre fiche a bien été mis à jour');
    }


    //supprime une fiche (back office)
    public function destroy($id)
    {
        $star = Identite::destroy($id);
        $suppression = "Votre fiche a bien été effacée";
        $stars = self::listeDesStars();
        $data = array(                                                          
            'stars' => $stars,                
            'suppression' => $suppression,                
        );
        return view('back/home')->with($data);
    }


    //Liste utilisée en back et en front
    public function listeDesStars(){
        $stars = DB::select(
            "SELECT 
                identites.*,
                photos.url_photo,
                photos.fk_identite_id
            FROM 
                identites
            LEFT JOIN
                photos ON photos.fk_identite_id = identites.id
            ORDER BY
                identites.prenom ASC
            ");

        return $stars;
    }
}
