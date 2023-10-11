<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use App\http\Controllers\Controller;

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
        $product = Product::with('category')->where('status','!=',0)->orderBy('id', 'ASC')->get();
        return view('backend.product.index')->with(compact('product'));
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status','!=',[0,2])->orderBy('id', 'ASC')->get();

        return view('backend.product.create')->with(compact('category'));

    }
    public function trash()
    {
        $product = Product::where('status','=',0,)->orderby('id','ASC')->get();
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
        return redirect()->route("category.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $product = Product::find($id);
        $product ->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();
        return redirect()->route("product.trash")->with('status','Khôi phục thành công');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $data = $request->validate([
          
            'name' => 'required|max:255',
            'status' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => 'required',
            
            'detail' => 'required',
            'slug' => 'required|unique:product|max:255',
            "image" => 'required|image|mimes:jpg,png,jpep,gif,svg|max:2048|
            dimensions:min_width:100,minheight:100,max_width:1000,max_height:1000',
           
          
        ]);
        $product = new Product();
        $product->name = $data['name'];
        $product->slug = $data['slug'];
        $product->qty = $data['qty'];
        $product->price = $data['price'];
        
        $product->detail = $data['detail'];
        $product->status = $data['status'];
        $product->created_at = date('Y-m-d H:i:s');
        $product->category_id = $data['category'];

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
        return redirect()->back()->with('status','Thêm sách thành công');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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