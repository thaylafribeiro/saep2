<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    public $timestamps = false;

    protected $table = 'agendamentos';

    protected $fillable = [
        'veiculo_id',
        'data_agendamento',
        'descricao',
        'status'
    ];

    protected $casts = [
        'data_agendamento' => 'datetime'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class, 'veiculo_id');
    }
}