<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelacaoUsuarioOrgao extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_orgao', 'tipo'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_user');
    }

    public function orgao()
    {
        return $this->belongsTo(Orgao::class, 'id_orgao');
    }
}