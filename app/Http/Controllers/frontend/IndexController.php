<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Product;
use App\http\Controllers\Controller;


class IndexController extends Controller
{
    public function home()
    {
        
        $product = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $formatted_products = [
            
        ];
    
        foreach ($product as $key => $value) {
            $price = number_format($value->price, 0, '.', ',');
            $price_sale = number_format($value->price_sale, 0, '.', ',');
            $value->price = $price;
            $value->price_sale = $price_sale;
            $formatted_products[] = $value;
        }
    
        return view('welcome')->with(compact('formatted_products'));
    }
    


    
    public function productsale()
    {
    
        return view('frontend.productsale');
    }
    public function detail (){
        return view('frontend.detail');
    }
    
}
