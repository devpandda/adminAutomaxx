<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $table = 'modelos';

    protected $fillable = ['nome','descricao','anoIni', 'anoFim', 'idMontadora', 'idLinha'];



    public function montadora(){
        return $this->hasOne(Montadora::class, 'id', 'idMontadora');
    }

    public function linha(){

        return $this->hasOne(Linha::class, 'id', 'idLinha');

    }

}
