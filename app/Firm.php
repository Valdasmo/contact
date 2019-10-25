<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    public function firmCustomers()
    {
        return $this->hasMany('App\Customer', 'firm_id', 'id');
    }
 
}
