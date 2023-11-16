<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name' ,'slug','metadesc','status','created_at','updated_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'topic';

    public function post()
    {
        return $this -> hasMany('App\Models\Post');
    }
}
