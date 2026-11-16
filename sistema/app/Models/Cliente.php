<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'endereco'
    ];

    public function getCpfAttribute($valor)
    {
        if (empty($valor)) {
            return '';
        }

        return Crypt::decryptString($valor);
    }

    public function setCpfAttribute($valor)
    {
        if (!empty($valor)) {
            $this->attributes['cpf'] = Crypt::encryptString($valor);
        }
    }

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class, 'cliente_id');
    }
}