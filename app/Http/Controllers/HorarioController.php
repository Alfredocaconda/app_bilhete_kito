<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
    
    public function index()
    {
        $horarios=Horario::all();
        return view("pages.horario",compact("horarios"));
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
            $valor=Horario::find($request->id);
        } else {
            # code...
            $valor=new Horario();
        }
        $valor->hora=$request->hora;
        $valor->local=$request->local;
        $valor->descricao=$request->descricao;
        $valor->rota=$request->rota;
        $valor->save();
        return redirect()->back()->with("sucesso","Horario cadastrado com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $valor=Horario::find($id);
        return view("pages.horario",compact("valor"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function apagar( $id)
    {
        //
        Horario::find($id)->delete();
        return redirect()->back()->with("sucesso","Horario apagado com sucesso");
    }
}
