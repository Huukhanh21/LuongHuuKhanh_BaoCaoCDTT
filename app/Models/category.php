<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable =[
        'name','meta_desc','status','created_at','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'category';

    public function book()
    {
        return $this -> hasMany('App\Models\Book');
    }

}