<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'name' ,'status','slug' ,'image','created_at','updated_at','metadesc'
    ];
    protected $primaryKey = 'id';
    protected $table = 'brand';
}
