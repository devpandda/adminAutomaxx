<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    use HasFactory;

    protected $table = 'linhas';

    protected $fillable = ['nome','descricao'];
}
