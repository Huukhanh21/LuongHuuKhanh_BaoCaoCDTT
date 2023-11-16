<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\Topic;
use App\Models\Link;
use App\http\Controllers\Controller;
use App\Http\Requests\PostcStoreRequest;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.post.index')->with(compact('post'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function trash()
    {
        $post = Post::where('status','=',0)->orderby('id','DESC')->get();
        return view('backend.post.trash')->with(compact('post'));
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();
        return redirect()->back()->with('status','Xóa post thành công');
    }


    public function status($id)
    {
        $post = Post::find($id);
        $post ->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();
        return redirect()->route("post.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $post = Post::find($id);
        $post ->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->save();
        return redirect()->route("post.trash")->with('status','Khôi phục thành công');
    }




    public function create()
    {
        $topic = Topic::where('status','=',1)->orderBy('created_at', 'DESC')->get();
        $html_topic_id = '';
        foreach ($topic as $item)
        {
            $html_topic_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
        return view('backend.post.create')->with(compact('html_topic_id'));
    }
    public function store(PostStoreRequest $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug( $post->title = $request->title,'-');
        $post->metadesc = $request->metadesc;
        $post->status = $request->status;
        $post->detail = $request->detail;
        $post->topic_id = $request->topic_id;
        $post->type = 'post';
        $post->created_at = date('Y-m-d H:i:s');
    

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
    $image->move(public_path('image/post'), $newImageName);

    // Gán tên mới của file ảnh vào trường 'image' của đối tượng post
    $post->image = $newImageName;
} else {
    $post->image = 'default_image.jpg';
}



        if ($post->save())
        {
            $link = new Link();
            $link->slug = $post->slug;
            $link->type = 'post';
            $link->table_id = $post->id;
            $link->save();
        }
        return redirect()->back()->with('status','Thêm post thành công');
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
        $topic = Topic::where('status','!=',[0,2])->orderBy('id', 'DESC')->get();
        $post = Post::find($id);
        return view('backend.post.edit')->with(compact('post','topic'));
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
          
            'title' => 'required|max:255',
            'status' => 'required',
            'slug' => 'required',
            'topic' => 'required',
            'detail' => 'required',
            'type' => 'type',
            'metadesc' => 'required',
         
           
          
        ]);
        $post = Post::find($id);
        $post->title = $data['title'];
        $post->slug= $data['slug'];
        $post->topic_id= $data['topic'];
        $post->detail= $data['detail'];
        $post->type= $data['type'];
        $post->metadesc= $data['metadesc'];
        $post->status = $data['status'];
        $post->updated_at = date('Y-m-d H:i:s');
    

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
    $image->move(public_path('image/post'), $newImageName);

    // Gán tên mới của file ảnh vào trường 'image' của đối tượng post
    $post->image = $newImageName;
    } else {
        $post->image = 'default_image.jpg';
    }



    if ($post->save())
    {
        $link = Link::where([['type','=','post'],['table_id','=',$id]])->first;
        $link->slug = $post->slug;
        $link->save();
    }
        return redirect()->back()->with('status','Cập nhật thành công');
    }

   
   
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->delete($id)) {
            return redirect()->route('post.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}