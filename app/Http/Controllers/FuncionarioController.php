<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        $funcionario=Funcionario::all();
        return view("pages.funcionario",compact("funcionario"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valor=null;
        $user = null;
        if (isset($request->id)) {
            $valor= Funcionario::find($request->id);
        } else {
           $user = User::cadastrar($request);
            $valor= new Funcionario();
            $valor->user_id=$user->id;
        }
        $valor->name=$request->name;
        $valor->genero=$request->genero;
        $valor->data_nascimento=$request->data_nascimento;
        $valor->save();
        return redirect()->back()->with("Sucesso","Funcionario cadastrado com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $valor=Funcionario::find($id);
        return view("pages.funcionario",compact("valor"));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function apagar($id)
    {
        //
        Funcionario::find($id)->delete();
        return redirect()->back()->with("Sucesso","Funcionario eliminado com sucesso");
    }
}
