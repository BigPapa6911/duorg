<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiverInfo extends Model
{
    use HasFactory;

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'receivers_info';

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'blood_type',
        'required_organ',
        'emergency',
        'added_to_waitlist',
        'active',
        'user_id',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'emergency' => 'boolean',
        'active' => 'boolean',
        'added_to_waitlist' => 'datetime', // Cast para o formato datetime
    ];

    /**
     * O relacionamento com o modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
