<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nome', 'email', 'senha', 'id_endereco', 'id_perfil'];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'id_endereco');
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'id_perfil');
    }

    public function orgaos()
    {
        return $this->hasMany(RelacaoUsuarioOrgao::class, 'id_user');
    }

    public function hospitais()
    {
        return $this->belongsToMany(Hospital::class, 'hospitais_usuarios', 'id_user', 'id_hospital');
    }
}
