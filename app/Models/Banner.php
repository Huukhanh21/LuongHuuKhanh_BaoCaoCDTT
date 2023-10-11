<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'name' ,'status','position','link','metadesc' ,'image','created_at','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'banner';
}
