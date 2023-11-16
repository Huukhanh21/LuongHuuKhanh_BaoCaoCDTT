<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productstore extends Model
{
    use HasFactory;
    public $timestamps = true;
 
    protected $primaryKey = 'id';
    protected $table = 'productstore';

    public function product()
    {
        return $this -> belongsTo('App\Models\Product','product_id','id');
    }
    
}
