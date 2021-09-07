<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = ['nome','descricao'];


    public function atributos(){
        return $this->belongsToMany(Atributos::class,'categorias_atributos','idCategoria','idAtributo');
    }
}
