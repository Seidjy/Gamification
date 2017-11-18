<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAchieve extends Model
{
    protected $fillable = [
        'name','cnpj',
    ];
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
