<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilhete extends Model
{
    use HasFactory;
   public function cliente(){
    return $this->belongsTo(Cliente::class);
   }

   public function viagen(){
    return $this->belongsTo(Viagen::class,'viagen_id');
   }

   public static function bilheteActivo(){
        foreach(Bilhete::whereDate('data_viagem',"<",date('Y-m-d'))->get() as $bilhete){
            $bilhete->estado = "Desativo";
            $bilhete->save();
        }
   }
}
