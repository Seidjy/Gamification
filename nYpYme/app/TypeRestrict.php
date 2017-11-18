<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRestrict extends Model
{
	protected $table = 'type_restricts';

    protected $fillable = [
        'name','cnpj',
    ];

    public function rules_to_restrict()
    {
        return $this->belongsToMany('App\RulesToRestrict', 'rules_to_restricts_idtyperestrict_foreign','idTypeRestrict');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}