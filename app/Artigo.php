<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    public function usuario(){
    	return $this->belongsTo('App\Usuario'); // Ligação de 1:N na tabela Usuario.id->Artigos.Usuario_id
    }
}
