<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use User as GlobalUser;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function auth(Request $request){
        $user = User::where('email', $request->email)->first();
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As Credencias inseridas estão erradas'],
            ]);
        }
       Auth::login($user,$remember = true);
       if(Auth::user()->tipo != 'Cliente'){
           return redirect('/');
       }else{
            return redirect()->route('client.index');
       }
    }
    public function index()
    {
        //
        $user=User::where('tipo','<>','Admin')->get();
        return view("pages.user",compact("user"));
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
            $valor= User::find($request->id);
        } else {
            # code...
            $valor= new User();
        }
        $valor->name=$request->name;
        $valor->email=$request->email;
        $valor->tipo=$request->tipo;
        $valor->password=bcrypt($request->password);
        $valor->save();
        return redirect()->back()->with("Sucesso","Usuario cadastrado com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $valor=User::find($id);
        return view("pages.user",compact("valor"));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function apagar($id)
    {
        User::find($id)->delete();
        $sms = "usuario Eliminado com sucesso";
        return redirect()->back()->with("Sucesso",$sms);
    }

    public function cadastrar(Request $request){
        $valor=null;
        $user = null;
        if (isset($request->id)) {
            # code...
            $valor= Cliente::find($request->id);
        } else {
            # code...
            $user = User::cadastrarCliente($request);
            $valor=new Cliente();
            $valor->user_id = $user->id;
        }
        $valor->nome=$request->nome;
        $valor->nbi=$request->nbi;
        $valor->telefone1=$request->telefone1;
        $valor->telefone2=$request->telefone1;
        $valor->data_nascimento=$request->data_nascimento;
        $valor->save();
        if(User::entrar($request)){
            return redirect()->route('client.index');
        }else{
            return redirect()->route('auth.login');
        }
    }

   public function perfil(){
        return view('pages.perfil.perfil');
   }
}
