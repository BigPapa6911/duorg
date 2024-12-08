<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'type',
        'gender',
        'cpf',
        'rg',
        'zip_code',
        'state',
        'city',
        'district',
        'address',
    ];

    /**
     * Os atributos que devem ser ocultados durante a serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Atributos que devem ser convertidos para tipos nativos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    /**
     * Verifica se o usuário é um doador.
     *
     * @return bool
     */
    public function isDonor()
    {
        return $this->type === 'DONOR';
    }

    /**
     * Verifica se o usuário é um receptor.
     *
     * @return bool
     */
    public function isReceiver()
    {
        return $this->type === 'RECEIVER';
    }

    /**
     * Verifica se o usuário é um administrador.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->type === 'ADMIN';
    }

    /**
     * Criptografa a senha automaticamente antes de salvar o usuário.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->password) {
                $user->password = bcrypt($user->password);
            }
        });
    }
}
