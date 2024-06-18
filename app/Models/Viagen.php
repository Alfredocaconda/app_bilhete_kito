<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viagen extends Model
{
    use HasFactory;
    public function motorista1(){
        return $this->belongsTo(Motorista::class,'moto1_id');
    }
    public function motorista2(){
        return $this->belongsTo(Motorista::class,'moto2_id');
    }
    public function  carro(){
        return $this->belongsTo(Carro::class);
    }
    public function horario(){
        return $this->belongsTo(Horario::class);
    }

    public function validacao($viagen_id,$cliente):bool{
        $confirm = Bilhete::where('viagen_id',$viagen_id)->where('cliente_id',$cliente)->first();
        if($confirm==null){
            return true;
        }
        return false;
    }
    public function acento($viagen_id, $acento):bool{
        $confirm = Bilhete::where('viagen_id',$viagen_id)->where('acento',$acento)->where('data_viagem',date('Y-m-d'))->first();
           if($confirm==null){
                return true;
           }
        return false;
    }
}
