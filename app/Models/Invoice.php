<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Order;

class Invoice extends Model
{
    protected $guarded = [];

    public function order()
    {
    	return $this->hasOne('App\Models\Order');
    }
}
