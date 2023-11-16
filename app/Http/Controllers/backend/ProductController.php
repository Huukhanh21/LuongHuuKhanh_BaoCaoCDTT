<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('category','brand')->where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.product.index')->with(compact('product'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function trash()
    {
        $product = Product::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.product.trash')->with(compact('product'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();
        return redirect()->back()->with('status','Xóa thể loại thành công');
    }


    public function status($id)
    {
        $product = Product::find($id);
        $product ->status = ($product->status == 1) ? 2 : 1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();
        return redirect()->route("product.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $product = Product::find($id);
        $product ->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();
        return redirect()->route("product.trash")->with('status','Khôi phục thành công');
    }




    public function create()
    {
        $category = Category::where('status','=',1)->orderBy('id', 'DESC')->get();
        $brand = Brand::where('status','=',1)->orderBy('id', 'DESC')->get();
        $html_category_id = '';
        foreach ($category as $item)
        {
            $html_category_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
        $html_brand_id = '';
        foreach ($brand as $item)
        {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
        return view('backend.product.create')->with(compact('html_category_id','html_brand_id'));

    }
    public function store(ProductStoreRequest $request)
    {
      
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->slug = Str::slug( $product->name = $request->name,'-');
        $product->price_buy = $request->price_buy;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->qty = $request->qty;

        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');

       // Lấy file ảnh từ request
$image = $request->file('image');

// Kiểm tra xem có file ảnh được tải lên không
if ($image) {
    // Lấy tên gốc của file
    $originalName = $image->getClientOriginalName();

    // Tạo tên mới cho file ảnh
    $extension = $image->getClientOriginalExtension();
    $newImageName = time() . '_' . rand(0, 99) . '.' . $extension;

    // Di chuyển file ảnh vào thư mục lưu trữ
    $image->move(public_path('image/product'), $newImageName);

    // Gán tên mới của file ảnh vào trường 'image' của đối tượng product
    $product->image = $newImageName;
} else {
    $product->image = 'default_image.jpg';
}



        $product->save();
        return redirect()->back()->with('status','Thêm sản phẩm thành công');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $product = Product::find($id);
  
        return view('backend.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $product = Product::find($id);
        $category = Category::where('status','=',1)->orderBy('id', 'DESC')->get();
        $brand = Brand::where('status','=',1)->orderBy('id', 'DESC')->get();
        $html_category_id = '';
        foreach ($category as $item)
        {
            $html_category_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
        $html_brand_id = '';
        foreach ($brand as $item)
        {
            $html_brand_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
   
        return view('backend.product.edit')->with(compact('product','html_category_id','html_brand_id'));
    }


    public function update(ProductUpdateRequest $request, $id)
    {

        $product = Product::find($id);
   
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->slug = Str::slug( $product->name = $request->name,'-');
        $product->price_buy = $request->price_buy;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->qty = $request->qty;

        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
       // Lấy file ảnh từ request
        $image = $request->file('image');

        // Kiểm tra xem có file ảnh được tải lên không
        if ($image) {
            // Lấy tên gốc của file
            $originalName = $image->getClientOriginalName();

            // Tạo tên mới cho file ảnh
            $extension = $image->getClientOriginalExtension();
            $newImageName = time() . '_' . rand(0, 99) . '.' . $extension;

            // Di chuyển file ảnh vào thư mục lưu trữ
            $image->move(public_path('image/product'), $newImageName);

            // Gán tên mới của file ảnh vào trường 'image' của đối tượng product
            $product->image = $newImageName;
        } else {
            $product->image = 'default_image.jpg';
        }
        $product->save();
        return redirect()->back()->with('status','Cập nhật sản phẩm thành công');
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->delete($id)) {
            return redirect()->route('product.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}