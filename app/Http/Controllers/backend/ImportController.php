<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\MyCart;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\http\Controllers\Controller;
use App\Models\Productstore;

use Illuminate\Http\Request;

class ImportController extends Controller
{

    public function index()
    {
        $product = Product::where('product.status','!=',0)
        ->join('category','category_id','=','product.category_id')
        ->join('brand','brand_id','=','product.brand_id')
        ->select('product.id','product.name','product.slug','product.status',
         'product.image','category.name as categoryname','brand.name as brandname')
        ->orderBy('product.created_at')->get();
        $listproduct = MyCart::with('product')->where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.import.index')->with(compact('listproduct','product'));
    }
    
    public function storeimport(Request $request)
    {
        $arr_qty = $request->qty;
        $arr_price = $request->price;
        foreach($arr_price as $productid => $price){
            $productstore = new Productstore();
            $productstore->product_id = $productid;
            $productstore->qty = $arr_qty[$productid];
            $productstore->price = $price;
            $productstore->created_at = date('Y-m-d H:i:s');
            $productstore->save();

        }
        return redirect()->back()->with('status','Thêm thành công');
       
    }

    
}
