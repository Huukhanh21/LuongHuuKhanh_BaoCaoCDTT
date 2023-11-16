<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'product';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id','id');
    }
    public function productsale()
    {
        return $this -> hasMany('App\Models\Productsale');
    }
    public function productstore()
    {
        return $this -> hasMany('App\Models\Productstore');
    }
    public function mycart()
    {
        return $this -> hasMany('App\Models\MyCart');
    }
}
