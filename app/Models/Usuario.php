<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

    use HasApiTokens, Notifiable;

    protected $fillable = ['nome', 'email', 'senha', 'id_endereco', 'id_perfil'];

    protected $hidden = ['senha'];

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
