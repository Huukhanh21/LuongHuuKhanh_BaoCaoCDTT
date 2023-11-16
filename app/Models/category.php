<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
  

    protected $table = 'category';

    public function product()
    {
        return $this -> hasMany('App\Models\Product');
    }
    public function ParentCategory()
    {
        if ($this->parent_id) {
            $parentCategory = Category::find($this->parent_id);
            return $parentCategory ? $parentCategory->name : 'Unknown';
        } else {
            return 'Không có danh mục cha';
        }
    }

}