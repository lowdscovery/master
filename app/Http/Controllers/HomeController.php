<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Intervenant;
use App\Models\Maintenance;
use App\Models\Incident;
use App\Notifications\UserFollowNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $user=false;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {
        $today = Carbon::today();
        
        $count = User::count();
        $count1 = Intervenant::count();
        $count2 = Maintenance::count();
        $count3 = Incident::count();
       
            $search = $request->query('search');
    
            if ($search) {
                $count4 = Intervenant::where('nom', 'like', '%' . $search . '%')
                                       ->Orwhere('prenom', 'like', '%' . $search . '%')->get();
            } else {
                $count4 = Intervenant::all();
            }

            // Vérifier si une maintenance a lieu aujourd'hui et que read == 1
            $alarme = Maintenance::whereDate('datemaintenance', $today)
            ->where('read', 0)
            ->exists();
     
        return view('home',['count' => $count,'count1' => $count1,
                            'count2' => $count2,'count3' => $count3,
                            'count4' => $count4,'alarme' => $alarme]);
    }


public function remove($id)
{
    $Intervenant = Intervenant::find($id);
    
    if ($Intervenant) {
        $Intervenant->delete();

        // Rediriger avec un événement de succès
        return redirect('/')->with('status', 'Data Deleted Successfully')->with('dispatch-event', 'intervenant-deleted');
    }
    
    return redirect('/')->with('error', 'Intervenant not found');
}





public function edit($id)
{
    // Recherchez l'intervenant par ID
    $intervenant = Intervenant::findOrFail($id);

    // Retournez une vue avec l'intervenant à modifier
    return view('intervenants.edit', compact('intervenant'));
}

public function update(Request $request, $id)
{
    // Valider les données du formulaire
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'service' => 'required|string|max:255',
        'matricule' => 'required|string|max:255',
        'sexe' => 'required',
        'telephone' => 'required|regex:/^[0-9]{10}$/',
        'dateEmbauche' => 'required|date',
      //  'photo' => 'nullable|image|max:1024', // Valider l'image
    ]);

    // Trouver l'intervenant à mettre à jour
    $intervenant = Intervenant::find($id);

    // Mise à jour des informations
    $intervenant->nom = $request->nom;
    $intervenant->prenom = $request->prenom;
    $intervenant->service = $request->service;
    $intervenant->matricule = $request->matricule;
    $intervenant->sexe = $request->sexe;
    $intervenant->telephone = $request->telephone;
    $intervenant->dateEmbauche = $request->dateEmbauche;

    // Gestion de la photo
    if ($request->hasFile('photo')) {
        // Supprimer l'ancienne photo si elle existe
        if ($intervenant->photo) {
            Storage::delete($intervenant->photo);
        }
        // Stocker la nouvelle photo
        $intervenant->photo = $request->file('photo')->store('upload', 'public');
    }

    // Sauvegarder les modifications
    $intervenant->save();

    // Redirection après la mise à jour
    return redirect()->route('intervenants.index')->with('success', 'Intervenant mis à jour avec succès.');
}

}
