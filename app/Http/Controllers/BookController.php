<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::with('category')->where('status','!=',0)->orderBy('id', 'ASC')->get();
        return view('backend.book.index')->with(compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status','!=',[0,2])->orderBy('id', 'ASC')->get();

        return view('backend.book.create')->with(compact('category'));

    }
    public function trash()
    {
        $book = Book::where('status','=',0,)->orderby('id','ASC')->get();
        return view('backend.book.trash')->with(compact('book'));
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->status = 0;
        $book->updated_at = date('Y-m-d H:i:s');
        $book->save();
        return redirect()->back()->with('status','Xóa thể loại thành công');
    }


    public function status($id)
    {
        $book = Book::find($id);
        $book ->status = ($book->status == 1) ? 2 : 1;
        $book->updated_at = date('Y-m-d H:i:s');
        $book->save();
        return redirect()->route("category.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $book = Book::find($id);
        $book ->status = 2;
        $book->updated_at = date('Y-m-d H:i:s');
        $book->save();
        return redirect()->route("book.trash")->with('status','Khôi phục thành công');
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
          
            'name' => 'required|unique:book|max:255',
            'status' => 'required',
            'category' => 'required',
            'slug' => 'required|unique:book|max:255',
            "image" => 'required|image|mimes:jpg,png,jpep,gif,svg|max:2048|
            dimensions:min_width:100,minheight:100,max_width:1000,max_height:1000',
           
          
        ]);
        $book = new Book();
        $book->name = $data['name'];
        $book->slug = $data['slug'];
        $book->status = $data['status'];
        $book->created_at = date('Y-m-d H:i:s');
        $book->category_id = $data['category'];

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
    $image->move(public_path('image/book'), $newImageName);

    // Gán tên mới của file ảnh vào trường 'image' của đối tượng book
    $book->image = $newImageName;
} else {
    $book->image = 'default_image.jpg';
}



        $book->save();
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
        $book = Book::find($id);
        if ($book->delete($id)) {
            return redirect()->route('book.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}