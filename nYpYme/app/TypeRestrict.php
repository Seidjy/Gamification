<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRestrict extends Model
{
	protected $table = 'type_restricts';

    protected $fillable = [
        'name',
    ];

    public function rules_to_restrict()
    {
        return $this->belongsToMany('App\RulesToRestrict', 'rules_to_restricts_idtyperestrict_foreign','idTypeRestrict');
    }
}