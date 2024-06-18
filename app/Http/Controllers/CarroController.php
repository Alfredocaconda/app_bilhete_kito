<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $carro=Carro::orderBy('numero','ASC')->get();
        return view("pages.carro",compact("carro"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            $valor= Carro::find($request->id);
        } else {
            # code...
            $valor= new Carro();
        }
        $valor->numero=$request->numero;
        $valor->matricula=$request->matricula;
        $valor->lotacao=$request->lotacao;
        $valor->estado = "Livre";
        $valor->save();
        return redirect()->back()->with("Sucesso","Carro cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $valor=Carro::find($id);
        return view("pages.carro",compact("valor"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function apagar($id)
    {
        Carro::find($id)->delete();
        return redirect()->back()->with("Sucesso","carro eliminado com sucesso");
    }
}
