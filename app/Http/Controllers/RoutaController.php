<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rota;

class RoutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rotas=Rota::all();
        $pontos=[
            'Bengo',
            'Benguela',
            'Bíe',
            'Cabinda',
            'Cunene',
            'Huíla',
            'Huambo',
            'Luanda',
            'Lunda Norte',
            'Lunda Sul',
            'Kuando Kubango',
            'Kuanza Sul',
            'Kuanza Norte',
            'Malange',
            'Muxico',
            'Namibe',
            'Uige',
            'Zaire'
        ];
        return view("pages.rotas",compact("rotas",'pontos'));
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
            $valor= Rota::find($request->id);
        } else {
            # code...
            $valor= new Rota();
        }
        $valor->partida=$request->partida;
        $valor->destino=$request->destino;
        $valor->preco=$request->preco;
        $valor->save();
        return redirect()->back()->with("Sucesso","Roda cadastrado com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $valor=Rota::find($id);
        return view("pages.rotas",compact("valor"));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function apagar($id)
    {
        //
        Rota::find($id)->delete();
        return redirect()->back()->with("Sucesso","Rota eliminado com sucesso");
    }
}
