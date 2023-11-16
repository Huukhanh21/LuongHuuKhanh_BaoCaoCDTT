<?php

namespace App\Http\Controllers\backend;

use App\Models\Brand;
use App\Models\Link;
use App\http\Controllers\Controller;
use Illuminate\Support\Str;



use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.brand.index')->with(compact('brand'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }
    public function trash()
    {
        $brand = Brand::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.brand.trash')->with(compact('brand'));
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->save();
        return redirect()->back()->with('status','Xóa thương hiệu thành công');
    }


    public function status($id)
    {
        $brand = Brand::find($id);
        $brand ->status = ($brand->status == 1) ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->save();
        return redirect()->route("brand.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $brand = Brand::find($id);
        $brand ->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->save();
        return redirect()->route("brand.trash")->with('status','Khôi phục thành công');
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
          
            'name' => 'required|unique:brand|max:255',
            'status' => 'required',
            'metadesc' => 'required',
           
            "image" => 'required',
           
          
        ],
        [
                'name.unique' => 'Tên thương hiệu đã tồn tại! Hãy nhập tên thương hiệu khác.'
        ]);
        $brand = new Brand();
        $brand->name = $data['name'];
        $brand->slug = Str::slug( $brand->name = $request->name,'-');
        $brand->metadesc = $data['metadesc'];
        $brand->status = $data['status'];
        $brand->created_at = date('Y-m-d H:i:s');
    

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
        $image->move(public_path('image/brand'), $newImageName);

        // Gán tên mới của file ảnh vào trường 'image' của đối tượng Brand
        $brand->image = $newImageName;
        } else {
        $brand->image = 'default_image.jpg';
        }



        if ($brand->save())
        {
            $link = new Link();
            $link->slug = $brand->slug;
            $link->type = 'brand';
            $link->table_id = $brand->id;
            $link->save();
        }
        return redirect()->back()->with('status','Thêm thương hiệu thành công');
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
        $brand = Brand::find($id);
        return view('backend.brand.edit')->with(compact('brand'));
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
        $data = $request->validate([
          
            'name' => 'required',
            'status' => 'required',
            'metadesc' => 'required',
        ]);
        $brand = Brand::find($id);
        $brand->name = $data['name'];
        $brand->metadesc = $data['metadesc'];
        $brand->slug = Str::slug( $brand->name = $request->name,'-');
        $brand->status = $data['status'];
        $brand->updated_at = date('Y-m-d H:i:s');
        $image = $request->file('image');

// Kiểm tra xem có file ảnh được tải lên không
       if ($image) {
        // Lấy tên gốc của file
        $originalName = $image->getClientOriginalName();

        // Tạo tên mới cho file ảnh
        $extension = $image->getClientOriginalExtension();
        $newImageName = time() . '_' . rand(0, 99) . '.' . $extension;

        // Di chuyển file ảnh vào thư mục lưu trữ
        $image->move(public_path('image/brand'), $newImageName);

        // Gán tên mới của file ảnh vào trường 'image' của đối tượng Brand
        $brand->image = $newImageName;
        } else {
            $brand->image = 'default_image.jpg';
        }

        if ($brand->save())
        {
            $link = Link::where([['type','=','brand'],['table_id','=',$id]])->first;
            $link->slug = $brand->slug;
            $link->save();
        }
        return redirect()->back()->with('status','Cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if ($brand->delete($id)) {
            return redirect()->route('brand.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}