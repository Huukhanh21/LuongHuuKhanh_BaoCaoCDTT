<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = true;
  
    protected $primaryKey = 'id';
    protected $table = 'brand';

    public function product()
    {
        return $this -> hasMany('App\Models\Product');
    }
}
