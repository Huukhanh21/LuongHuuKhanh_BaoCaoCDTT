<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamp = false;
    protected $fillable =
    [
        'name' ,'status','slug' ,'image','created_at','category_id','brand_id','price','updated_at',
        "detail",'qty'
    ];
    protected $primaryKey = 'id';
    protected $table = 'product';

    public function category()
    {
        return $this -> belongsTo('App\Models\Category','category_id','id');
    }
    
}
