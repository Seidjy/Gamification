<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RulesToAward extends Model
{
    protected $fillable = [
        'name','idTypeAward','amount',
    ];
    public function type_award()
    {
        return $this->hasOne('App\TypeAward');
    }
}