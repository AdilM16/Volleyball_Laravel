<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        $equipes = Equipe::all();
        $roles = Role::all();
        $photos = Photo::all();
        return view('pages.joueurs.alljoueur', compact('joueurs', 'equipes', 'roles', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $joueurs = Joueur::all();
        $equipes = Equipe::all();
        $roles = Role::all();
        $photos = Photo::all();
        return view('pages.joueurs.create', compact('joueurs', 'equipes', 'roles', 'photos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nom' => ['required', 'min:3', 'max:35'],
            'prenom' => ['required', 'min:2', 'max:35'],
            'age' => ['required', 'min:1', 'max:5'],
            'telephone' => ['required', 'min:5', 'max:25'],
            'email' => ['required', 'min:5', 'max:35'],
            'genre' => ['required', 'min:2', 'max:25'],
            'pays' => ['required', 'min:2', 'max:35'],
            'role_id' => ['required'],
            'equipe_id' => ['required'],
        ]);

        $equipe = Equipe::find($request->equipe_id);

        if ($request->equipe_id == null) {
            $photo = new Photo;
            $photo->src = $request->file("src")->hashName();
            
            $photo->save();
            $request->file("src")->storePublicly("img", "public");

            $store = new Joueur;
            $store->nom = $request->nom;
            $store->prenom = $request->prenom;
            $store->age = $request->age;
            $store->telephone = $request->telephone;
            $store->email = $request->email;
            $store->pays = $request->pays;
            $store->genre = $request->genre;
            $store->role_id = $request->role_id;
            $store->equipe_id = $request->equipe_id;
            $store->photo_id = $photo->id;
            $store->save();
            return redirect('/joueur')->with('message', "IT'S REGISTERED!");
        } else {


            $avant = Joueur::all()->where("role_id", 1)->where("equipe_id", $equipe->id);
            $central = Joueur::all()->where("role_id", 2)->where("equipe_id", $equipe->id);
            $arriere = Joueur::all()->where("role_id", 3)->where("equipe_id", $equipe->id);


            switch ($request->role_id) {
                case 1:
                    if ($avant->count() === 2) {
                        return redirect()->back()->with("statut", "L'??quipe {$equipe->nom} dispose d??j?? de 2 joueurs ?? ce poste");
                    }
                    break;
                case 2:
                    if ($central->count() === 2) {
                        return redirect()->back()->with("statut", "L'??quipe {$equipe->nom} dispose d??j?? de 2 joueurs ?? ce poste");
                    }
                    break;
                case 3:
                    if ($arriere->count() === 2) {
                        return redirect()->back()->with("statut", "L'??quipe {$equipe->nom} dispose d??j?? de 2 joueurs ?? ce poste");
                    }
                    break;
            }
        }

        $photo = new Photo;
        Storage::put('public/img/', $request->file('src'));
        $photo->src = $request->file('src')->hashName();
        $photo->save();

        $store = new Joueur;
        $store->nom = $request->nom;
        $store->prenom = $request->prenom;
        $store->age = $request->age;
        $store->telephone = $request->telephone;
        $store->email = $request->email;
        $store->genre = $request->genre;
        $store->pays = $request->pays;
        $store->role_id = $request->role_id;
        $store->equipe_id = $request->equipe_id;
        $store->photo_id = $photo->id;
        $store->save();
        return redirect('/joueur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $show = Joueur::find($id);
        return view('pages.joueurs.index', compact('show'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Joueur::find($id);
        $joueurs = Joueur::all();
        $equipes = Equipe::all();
        $roles = Role::all();
        $photos = Photo::all();
        return view('pages.joueurs.edit', compact('edit', 'equipes', 'roles', 'photos', 'joueurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Joueur::find($id);
        if ($request->src != null) {
            Storage::delete('public/img/' . $update->photos->src);
            Storage::put('public/img/', $request->file('src'));
            $update->photos->src = $request->file('src')->hashName();
        }
        $update->nom = $request->nom;
        $update->prenom = $request->prenom;
        $update->age = $request->age;
        $update->telephone = $request->telephone;
        $update->email = $request->email;
        $update->genre = $request->genre;
        $update->pays = $request->pays;
        $update->role_id = $request->role_id;
        $update->equipe_id = $request->equipe_id;
        $update->push();
        return redirect('/joueur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Joueur::find($id);
        $destroy->delete();
        return redirect('/joueur');
    }
}