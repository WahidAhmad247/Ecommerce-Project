<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->hasOne('App\models\User','id','user_id');
    }
    public function product(){
        return $this->hasOne('App\models\Product','id','product_id');
    }
}
