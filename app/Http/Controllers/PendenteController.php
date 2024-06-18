<?php

namespace App\Http\Controllers;

use App\Models\Pendente;
use Illuminate\Http\Request;

class PendenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $valor=Pendente::all();
        return view("pages.pendente",compact("valor"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valor=null;
        if (isset($request->id)) {
            # code...
            $valor= Pendente::find($request->id);
        } else {
            # code...
            $valor= new Pendente();
        }
        $valor->bilhete_id=$request->bilhete_id;
        $valor->estado=$request->estado;
        $valor->motivo=$request->motivo;
        $valor->save();
        return redirect()->back()->with("sucesso","BILHETE PENDENTE");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $valor=Pendente::find($id);
        return view("pages.pendente",compact("valor"));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function apagar($id)
    {
        //
        Pendente::find($id)->delete();
        return redirect()->back()->with("sucesso","BILHETE PENDENTE APAGADO COM SUCESSO");
    }
}
