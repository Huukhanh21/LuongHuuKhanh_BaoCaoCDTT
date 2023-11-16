<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;
 
    protected $primaryKey = 'id';
    protected $table = 'post';

    public function topic()
    {
        return $this -> belongsTo('App\Models\Topic','topic_id','id');
    }
}
