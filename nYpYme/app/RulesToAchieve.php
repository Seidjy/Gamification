<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesToAchieve extends Model
{
    protected $fillable = [
        'name', 'idTypeAchieve', 'amount', 'gather',
    ];
    public function type_achieve()
    {
        return $this->hasOne('App\TypeAchieve');
    }
}