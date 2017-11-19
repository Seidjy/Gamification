<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'id', 'idCustomer','idTypeTransactions', 'amount','cnpj',
    ];

    public function customer()
    {
        return $this->hasOne('App\Customer');
    }
    public function type_transaction()
    {
        return $this->hasOne('App\TypeTransaction');
    }
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
 ?>