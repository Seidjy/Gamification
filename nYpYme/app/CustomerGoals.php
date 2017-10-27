<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerGoals extends Model
{
	protected $fillable = [
        'idGoals', 'idCustomers', 'amount',
    ];

    public function customer()
    {
        return $this->hasOne('App\Customer');
    }
    public function goal()
    {
        return $this->hasOne('App\Goal');
    }
}
