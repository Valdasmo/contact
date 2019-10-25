<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function customerFirm()
    {
        return $this->belongsTo('App\Firm', 'firm_id', 'id');
    }
 
}
