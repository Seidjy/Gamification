<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesToAchieve extends Model
{
    protected $fillable = [
        'name', 'idTypeAchieve', 'amount', 'gather','cnpj',
    ];
    public function type_achieve()
    {
        return $this->hasOne('App\TypeAchieve');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}