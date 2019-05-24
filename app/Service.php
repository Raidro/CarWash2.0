<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];//
    const PAYMENT_TYPES = [
        0 => 'A vista',
        1 => 'Cartao de Debito',
        2 => 'Cartao de Credito 1x',
        // ... 
    ];

    protected $guarded = [];//
    const SERVICE_TYPES = [
        0 => 'Simples',
        1 => 'Completa',
    
        // ... 
    ];
}
