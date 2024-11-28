<?php

namespace App\Http\Controllers;

use App\Models\Bilhete;
use App\Models\Horario;
use App\Models\Viagen;
use Exception;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BilheteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bilhete=Bilhete::orderBy('estado','ASC')->get();
        return view("pages.bilhetes",compact("bilhete"));
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
        if(Viagen::acento($request->viagen_id,$request->acento,$request->data_viagem)){

        
        $valor=null;
        if (isset($request->id)) {
            # code...
            $valor= Bilhete::find($request->id);
        } else {
            # code...
            $valor= new Bilhete();
        }
        // if(isset($request->funcionario_id)){
        //     $valor->funcionario_id=$request->funcionario_id;
        // }
        $valor->cliente_id=Auth::user()->cliente->id;
        $valor->viagen_id=$request->viagen_id;
        $valor->funcionario_id = $request->funcionario_id ?? $valor->funcionario_id;
        $valor->estado="Activo";
        $valor->descricao=$request->descricao;
        $valor->acento=$request->acento;
        $valor->data_viagem=$request->data_viagem;
        $valor->save();

        $data=[
           'valor' => $valor
        ];
         
        $pdf = PDF::loadView('pages.cliente.bilhete', $data);
       
        return $pdf->download('bilhete.pdf');
    }else{
        return redirect()->back()->with('Error','Acesso escolhido já esta ocupado');
    }
       // return redirect()->route('client.index');
        //dd($valor);
        //return view('pages.cliente.bilhete',compact("valor"));
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $valor=Bilhete::find($id);
        return view("pages.bilhete",compact("valor"));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function apagar( $id)
    {
        //
        Bilhete::find($id)->delete();
        return redirect()->back()->with("sucesso","Bilhete Apagado com sucesso");
    }

    public function ticket($id){
        $finde = Viagen::find($id);
        return view('pages.cliente.ticket',compact('finde'));
    }

    public function acento($id){
        return view('pages.cliente.acentos',['finde'=>Horario::find($id)]);
    }

    public function comprar(Request $request){
      try{
        $tick = Bilhete::find($request->id);
        $tick->estado = "Desativo";
        $tick->save();
        return redirect()->back()->with('Sucesso','Comprar realizada com exito');
      }catch(Exception $e){
        return redirect()->back()->with('Erro','Comprar não realizada');
      }
    }
}
