<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cidade', 'estado'];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'hospitais_usuarios', 'id_hospital', 'id_user');
    }
}