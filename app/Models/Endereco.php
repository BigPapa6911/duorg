<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = ['rua', 'numero', 'cidade', 'estado', 'cep'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_endereco');
    }
}