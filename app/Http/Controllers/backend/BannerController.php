<?php

namespace App\Http\Controllers\backend;

use App\Models\Banner;
use App\http\Controllers\Controller;



use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.banner.index')->with(compact('banner'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }
    public function trash()
    {
        $banner = Banner::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.banner.trash')->with(compact('banner'));
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->save();
        return redirect()->back()->with('status','Xóa banner thành công');
    }


    public function status($id)
    {
        $banner = Banner::find($id);
        $banner ->status = ($banner->status == 1) ? 2 : 1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->save();
         return redirect()->route("banner.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $banner = Banner::find($id);
        $banner ->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->save();
        return redirect()->route("banner.trash")->with('status','Khôi phục thành công');
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
            'metadesc' => 'required',
            'position' => 'required',
            'link' => 'required',
            "image" => 'required',
           
          
        ]);
        $banner = new Banner();
        $banner->name = $data['name'];
        $banner->position= $data['position'];
        $banner->metadesc= $data['metadesc'];
        $banner->link= $data['link'];
        $banner->status = $data['status'];
        $banner->created_at = date('Y-m-d H:i:s');
    

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
    $image->move(public_path('image/banner'), $newImageName);

    // Gán tên mới của file ảnh vào trường 'image' của đối tượng Banner
    $banner->image = $newImageName;
} else {
    $banner->image = 'default_image.jpg';
}



        $banner->save();
        return redirect()->back()->with('status','Thêm banner thành công');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('backend.banner.edit')->with(compact('banner'));
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
          
            'name' => 'required|unique:banner|max:255',
            'status' => 'required',
            'metadesc' => 'required',
            'position' => 'required',
            'link' => 'required',
            "image" => 'required',
           
          
        ]);
        $banner = Banner::find($id);
        $banner->name = $data['name'];
        $banner->position= $data['position'];
        $banner->metadesc= $data['metadesc'];
        $banner->link= $data['link'];
        $banner->status = $data['status'];
        $banner->updated_at = date('Y-m-d H:i:s');
    

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
    $image->move(public_path('image/banner'), $newImageName);

    // Gán tên mới của file ảnh vào trường 'image' của đối tượng Banner
    $banner->image = $newImageName;
} else {
    $banner->image = 'default_image.jpg';
}



        $banner->save();
        return redirect()->back()->with('status','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $banner = Banner::find($id);
        if ($banner->delete($id)) {
            return redirect()->route('banner.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}