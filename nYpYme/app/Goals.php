<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    protected $fillable = [
        'name', 'idRuleToAchieve', 'idRuleToRestrict', 'idRuleToAward',
    ];
}
