<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table="customer";

    public function order()
    {
        return $this->hasMany('App\models\order', 'customer_id', 'id');
    }

    public function ghtk()
    {
        return $this->hasMany('App\models\ghtk', 'customer_id', 'id');
    }
}
