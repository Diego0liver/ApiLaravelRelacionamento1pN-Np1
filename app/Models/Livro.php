<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'abreviacao', 'posicao', 'testamento_id'];

    //Pegando testamento 1:1

    function testamento(){
        return $this->belongsTo(Testamento::class);
    }

    function versiculo(){
        return $this->hasMany(Versiculo::class);
    }
}
