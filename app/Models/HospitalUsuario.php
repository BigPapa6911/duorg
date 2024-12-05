<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalUsuario extends Model
{
    use HasFactory;

    protected $table = 'hospitais_usuarios'; // Nome da tabela no banco de dados

    protected $fillable = [
        'id_hospital',
        'id_user',
    ];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'id_hospital');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_user');
    }
}