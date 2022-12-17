<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->roles[0]->name == "admin"){
            $rdvs = Appointement::with('users')->get();
            $users = User::all();
            return view('rendez-vous.index', compact('rdvs','users')) ;
        }else{
            $rdvs = Appointement::where('patient_id','=',Auth::user()->id)->get();
            $users = User::all();
            return view('rendez-vous.index', compact('rdvs','users'))->with('rendezVous');
            // rendezVous
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rdv = new Appointement;
        // $request->all()
        $rdv->dateRdv = $request->dateRdv;
        $rdv->objet = $request->objet;
        $rdv->description = $request->description;
        $rdv->statut = "En Attente";
        $rdv->patient_id = Auth::user()->id;
        $rdv->save();
        return redirect()->route('rdv.index')->with('message', 'Rendez-vous crée !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function show(Appointement $appointement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointement $appointement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointement $appointement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointement  $appointement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointement $appointement)
    {
        //
    }

    public function confirmer($id)
    {
        $rdv = Appointement::find($id);
        $rdv->statut = "Confirmer";
        $rdv->save();

        return redirect()->route('rdv.index')->with('message', 'Rendez-vous confirmer avec succes !');
    }

    public function annuler($id)
    {
        $rdv = Appointement::find($id);
        $rdv->statut = "Annuler";
        $rdv->save();

        return redirect()->route('rdv.index')->with('message', 'Rendez-vous annuler avec succes !');
    }
}
