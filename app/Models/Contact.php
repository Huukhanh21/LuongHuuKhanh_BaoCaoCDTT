<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
        'name' ,'status' ,'email','phone','title','content','created_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'contact';
}
