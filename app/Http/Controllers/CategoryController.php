<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status','!=',0, )->orderBy('id', 'ASC')->get();
        return view('backend.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }
    /**
     *
     *trash
     */
    public function trash()
    {
        $category = Category::where('status','=',0,)->orderby('id','ASC')->get();
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:category',
            'meta_desc' => 'required',
            'status' => 'required',
            'slug' => 'required',
          
        ]);
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->meta_desc = $data['meta_desc'];
        $category->status = $data['status'];
        $category->created_at = date('Y-m-d H:i:s');

        $category->save();
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
    public function edit($slug)
    {
        $cat = Category::find($slug);
        return view('backend.category.edit')->with(compact('cat'));

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
            'meta_desc' => 'required',
            'status' => 'required',
            'slug' => 'required',

          
        ]);
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->meta_desc = $data['meta_desc'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back()->with('status','Cập nhật danh mục thành công');
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