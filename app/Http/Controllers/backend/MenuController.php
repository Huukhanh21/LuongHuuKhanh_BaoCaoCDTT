<?php

namespace App\Http\Controllers\backend;

use App\Models\Menu;
use App\http\Controllers\Controller;



use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.menu.index')->with(compact('menu'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.menu.create');
    }
    public function trash()
    {
        $menu = Menu::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.menu.trash')->with(compact('menu'));
    }

    public function delete($id)
    {
        $menu = Menu::find($id);
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->save();
        return redirect()->back()->with('status','Xóa menu thành công');
    }


    public function status($id)
    {
        $menu = Menu::find($id);
        $menu ->status = ($menu->status == 1) ? 2 : 1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->save();
        return redirect()->route("menu.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $menu = Menu::find($id);
        $menu ->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->save();
        return redirect()->route("menu.trash")->with('status','Khôi phục thành công');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // 'name' ,'status','type','link','level' ,'table_id','created_at','updated_at'

        $data = $request->validate([
          
            'name' => 'required|unique:menu|max:255',
            'status' => 'required',
            'type' => 'required',
            'level' => 'required',
            'link' => 'required',
           
          
        ]);
        $menu = new Menu();
        $menu->name = $data['name'];
        $menu->type= $data['type'];
        $menu->level= $data['level'];
        $menu->link= $data['link'];
        $menu->status = $data['status'];
        $menu->created_at = date('Y-m-d H:i:s');
    

        $menu->save();
        return redirect()->back()->with('status','Thêm menu thành công');
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
        $menu = Menu::find($id);
        return view('backend.menu.edit')->with(compact('menu'));
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

            'name' => 'required|max:255',
            'status' => 'required',
            'type' => 'required',
            'level' => 'required',
            'link' => 'required',
           
          
        ]);
        $menu = Menu::find($id);
        $menu->name = $data['name'];
        $menu->type= $data['type'];
        $menu->level= $data['level'];
        $menu->link= $data['link'];
        $menu->table_id= $data['table_id'];
        $menu->status = $data['status'];
        $menu->updated_at = date('Y-m-d H:i:s');
    




        $menu->save();
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
        $menu = Menu::find($id);
        if ($menu->delete($id)) {
            return redirect()->route('menu.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}