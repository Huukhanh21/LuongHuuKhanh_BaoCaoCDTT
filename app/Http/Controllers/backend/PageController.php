<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Link;


use App\http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\PageStoreRequest;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Post::where([['status','!=',0,],['type','=','page'] ])
        ->select('id','title','status','image','slug','detail','metadesc')
        ->orderBy('created_at')->get();
        $count_all = Post::where('type','=','page')->count();
        $count_trash = Post::where([['status','=',0,],['type','=','page'] ])->count();
        return view('backend.page.index')->with(compact('page','count_all','count_trash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.create');
    }
    /**
     *
     *trash
     */
    public function trash()
    {
        $page = Post::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.page.trash')->with(compact('page'));
    }
  /**
     *
     *delete
     */
    public function delete($id)
    {
        $page = Post::find($id);
        $page ->status = 0;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->save();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }


    public function status($id)
    {
        $page = Post::find($id);
        $page ->status = ($page->status == 1) ? 2 : 1;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->save();
        return redirect()->route("page.index")->with('status','Thay đổi trạng thái thành công');
    }


    public function restore($id)
    {
        
        $page = Post::find($id);
        $page ->status = 2;
        $page->updated_at = date('Y-m-d H:i:s');
        $page->save();
        return redirect()->route("page.trash")->with('status','Khôi phục thành công');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $page = new Post();
        $page->title = $request->title;
        $page->slug = Str::slug( $page->name = $request->name,'-');
        $page->metadesc = $request->metadesc;
        $page->status = $request->status;
        $page->detail = $request->detail;
        $page->type = 'page';
        $page->created_at = date('Y-m-d H:i:s');
        //
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extension = $image->getClientOrginaExtention();
            $fileName = $page->slug . '.' . $extension;
            $image->storeAs('public/image/post',$fileName);
            $page->image = $fileName;

        }
        if ($page->save())
        {
            $link = new Link();
            $link->slug = $page->slug;
            $link->type = 'brand';
            $link->table_id = $page->id;
            $link->save();
        }
       
        return redirect()->back()->with('status','Thêm danh mục thành công');
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
        $pageedit = Post::find($id);
        $page = Post::where('status','!=',0, )->orderBy('id', 'DESC')->get();
        $html_parent_id = '';
        foreach ($page as $item)
        {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
        return view('backend.page.edit', compact('html_parent_id','pageedit'));

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
        $page = Post::find($id);
        $page->name = $request->name;
        $page->slug = Str::slug( $page->name = $request->name,'-');
        $page->meta_desc = $request->meta_desc;
        $page->status = $request->status;
        $page->parent_id = $request->parent_id;
        $page->updated_at = date('Y-m-d H:i:s');
        if ($page->save())
        {
            $link = Link::where([['type','=','page'],['table_id','=',$id]])->first;
            $link->slug = $page->slug;
            $link->save();
        }
        return redirect()->route('page.index')->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Post::find($id);
        if ($page->delete($id)) {
            return redirect()->route('page.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
   
  
}