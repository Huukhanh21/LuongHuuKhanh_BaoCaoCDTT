<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productsale;
use App\Models\Category;
use App\http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Link;
use App\Models\Post;
use App\Models\Brand;


class IndexController extends Controller
{
    public function index ($slug = null)
    {
        if($slug == null){
          return  $this->home();
        } else {
            $link = Link::where('slug', '=', $slug)->first();
            if ($link == null) {
                $product = Product::where([
                    ['status', '=', '1'],
                    ['slug', '=', $slug],
                ])->first();
                
                if ($product != null) {
                    $product->price = number_format($product->price, 0, '.', ',');
                    return $this->product_detail($product);
                
            }else{
                $args = [
                    ['status','=','1'],
                    ['slug','=',$slug],
                    ['type','=','post']
                ];
                $post = Post::where($args)->first();
                if ($post != null){
                    return $this ->post_detail($post);
                }
                else{
                    return $this->error_404($slug);
                 }
            }
            } else {
                $type = $link -> type;
                switch ($type) {
                    case 'category' : {
                        return $this->product_category($slug);
                    }
                    case 'brand' : {
                        return $this->product_brand($slug);
                    }
                    case 'page' : {
                        return $this->post_page($slug);
                    }
                    case 'post' : {
                        return $this->post_topic($slug);
                    }
                }
            }
        }
       
    }

//////trang chu
    public function home()
    {
        $productsale = Productsale::where('status', 1)->orderBy('id', 'DESC')->paginate(4);
     
      
        $product = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $formatted_products = [
            
        ];
    
        foreach ($product as $key => $value) {
            $price = number_format($value->price, 0, '.', ',');
            $value->price = $price;
            $formatted_products[] = $value;
        }
        ////////////

        $list_category = Category::where([['parent_id','=','2'],['status','=',1]])->get();
        return view('frontend.home')->with(compact('formatted_products','productsale','list_category'));
    }
    
    public function product_category($slug){

       $row_cat = Category::where([['slug','=',$slug],['status','=',1]])->first();
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
          ->paginate(4);
          $formatted_products = [
        ];
        foreach ($list_product as  $value) {
            $price = number_format($value->price, 0, '.', ',');
            $value->price = $price;
            $formatted_products[] = $value;
        }
        return view('frontend.product-category',compact('list_product','row_cat'));
    }
    public function product_brand($slug){
      
        $row_brand = Brand::where([['slug','=',$slug],['status','=',1]])->first();
        
           $list_product = Product::where([
            ['status','=','1'],
            ['brand_id','=',$row_brand->id]])
           ->orderby('created_at','desc')
           ->paginate(4);
           $formatted_products = [
         ];
         foreach ($list_product as  $value) {
             $price = number_format($value->price, 0, '.', ',');
             $value->price = $price;
             $formatted_products[] = $value;
         }
        return view('frontend.product-brand',compact('list_product','row_brand'));
    }
    public function post_page($slug){
      
        return view('frontend.post-page');
    }
    public function post_topic($slug){
        
      
        return view('frontend.post-topic');
    }
    public function product_detail($product){
        
        return view('frontend.product-detail',compact('product'));
    }
    public function post_detail($post){
      
        return view('frontend.post-detail');
    }
    public function error_404($slug){
      
        return view('frontend.error-404');
    }
    public function product(){
        $product = Product::where('status', 1)->orderBy('id', 'DESC')->paginate(8);
        $formatted_products = [
            
        ];
    
        foreach ($product as $value) {
            $price = number_format($value->price, 0, '.', ',');
            $value->price = $price;
            $formatted_products[] = $value;
        }
        return view('frontend.product')->with(compact('product'));
    }


    public function productsale()
    {
        $productsale = Productsale::where('status', 1)->orderBy('id', 'DESC')->paginate(4);
    
        $formatted_productsale = [
            
        ];
        foreach ($productsale as $key => $value) {
            $price = number_format($value->product->price, 0, '.', ',');
            $pricesale = number_format($value->pricesale, 0, '.', ',');
            $value->product->price = $price;
            $value->pricesale = $pricesale;
            $formatted_productsale[] = $value;
        }
        return view('frontend.productsale')->with(compact('productsale'));
    }
 

    public function  post_list($type, $limit)
    {
        $args = [
        ['type', '=', $type],
        ['status', '=', 1]
        ];
        $posts = Post::where($args)
        ->orderBy('created_at', 'DESC')
        -> limit($limit)
        ->get();
        return response()->json(
        [
        'success' => true,
        'message' => 'Tải dữ liệu thành công',
        'posts' => $posts
        ],
        200
        );
    }

    public function cart(){
        return view('frontend.cart');
    }
   


    
}
