<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = [
        'cpf', 'endereco', 'points','cnpj',
    ];
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
