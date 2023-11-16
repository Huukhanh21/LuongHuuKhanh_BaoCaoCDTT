<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productsale extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable =
    [
        'qty' ,'date_begin','date_end' ,'status','created_at','product_id','pricesale','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'productsale';

    public function product()
    {
        return $this -> belongsTo('App\Models\Product','product_id','id');
    }
    
}
