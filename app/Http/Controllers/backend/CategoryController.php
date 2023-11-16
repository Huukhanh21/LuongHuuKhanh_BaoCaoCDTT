<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Link;

use App\http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryStoreRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status','!=',0, )->orderBy('id', 'DESC')->get();
        return view('backend.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status','!=',0, )->orderBy('id', 'DESC')->get();
        $html_parent_id = '';
        foreach ($category as $item)
        {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
        return view('backend.category.create', compact('html_parent_id'));
    }
    /**
     *
     *trash
     */
    public function trash()
    {
        $category = Category::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.category.trash')->with(compact('category'));
    }
  /**
     *
     *delete
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category ->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();
        return redirect()->back()->with('status','Xóa danh mục thành công');
    }


    public function status($id)
    {
        $category = Category::find($id);
        $category ->status = ($category->status == 1) ? 2 : 1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();
        return redirect()->route("category.index")->with('status','Thay đổi trạng thái thành công');
    }


    public function restore($id)
    {
        
        $category = Category::find($id);
        $category ->status = 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();
        return redirect()->route("category.trash")->with('status','Khôi phục thành công');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug( $category->name = $request->name,'-');
        $category->meta_desc = $request->meta_desc;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;
        $category->created_at = date('Y-m-d H:i:s');
        if ($category->save())
        {
            $link = new Link();
            $link->slug = $category->slug;
            $link->type = 'category';
            $link->table_id = $category->id;
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
        $categoryedit = Category::find($id);
        $category = Category::where('status','!=',0, )->orderBy('id', 'DESC')->get();
        $html_parent_id = '';
        foreach ($category as $item)
        {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item-> name . '</option>';
        }
        return view('backend.category.edit', compact('html_parent_id','categoryedit'));

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
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug( $category->name = $request->name,'-');
        $category->meta_desc = $request->meta_desc;
        $category->status = $request->status;
        $category->parent_id = $request->parent_id;
        $category->updated_at = date('Y-m-d H:i:s');
        if ($category->save())
        {
            $link = Link::where([['type','=','category'],['table_id','=',$id]])->first;
            $link->slug = $category->slug;
            $link->save();
        }
        return redirect()->route('category.index')->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->delete($id)) {
            return redirect()->route('category.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
   
  
}