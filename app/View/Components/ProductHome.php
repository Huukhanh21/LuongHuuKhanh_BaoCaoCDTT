<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Productsale;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductHome extends Component
{

    public $category;
    public function __construct($rowcat)
    {
        $this->category = $rowcat;
    }

   
    public function render()
    {
        $row_cat = $this->category;
        $list_category_id = array();
        array_push($list_category_id,$row_cat->id);
        //
        $list_category1 = Category::where([['parent_id','=', $row_cat->id],['status','=',1]])->get();
        if(count($list_category1) > 0) {
            foreach($list_category1 as $row_cat1){
                array_push($list_category_id, $row_cat1->id);
            
        
            $list_category2 = Category::where([['parent_id','=',$row_cat1->id],['status','=',1]])->get();
            if(count($list_category2) > 0) {
                foreach($list_category2 as $row_cat2){
                    array_push($list_category_id, $row_cat2->id);

                    $list_category3 = Category::where([['parent_id','=',$row_cat2->id],['status','=',1]])->get();
                    if(count($list_category3) > 0) {
                        foreach($list_category3 as $row_cat3){
                            array_push($list_category_id, $row_cat3->id);
                        }
                     }
                  }
               }
            }
        }
        //

        $list_product = Product::where('status','=','1')
        ->whereIn('category_id',$list_category_id)
        ->orderby('created_at','desc')
        ->take(15)
        ->get();
        $formatted_products = [
        ];
        foreach ($list_product as  $value) {
            $price = number_format($value->price, 0, '.', ',');
            $value->price = $price;
            $formatted_products[] = $value;
        }
        return view('components.product-home',compact('row_cat','list_product'));
    }
}
