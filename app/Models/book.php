<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamp = false;
    protected $fillable = [
        'name' ,'status','slug' ,'image','created_at','category_id','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'book';

    public function category()
    {
        return $this -> belongsTo('App\Models\Category','category_id','id');
    }
    
}
