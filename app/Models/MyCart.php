<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;
    protected $table = 'productstore';
    
    public function product()
    {
        return $this -> belongsTo('App\Models\Product','product_id','id');
    }
    

}
