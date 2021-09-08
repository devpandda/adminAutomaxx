<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = ['nome','descricao','SKU', 'codOem', 'codBarra', 'qtdUso', 'ref', 'ncm', 'voltagem', 'img', 'idCategoria'];

    public function categoria(){
        return $this->hasOne(Categoria::class, 'id', 'idCategoria');
;
    }


}
