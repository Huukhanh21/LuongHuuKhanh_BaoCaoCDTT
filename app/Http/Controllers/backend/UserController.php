<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\http\Controllers\Controller;



use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.user.index')->with(compact('user'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }
    public function trash()
    {
        $user = User::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.user.trash')->with(compact('user'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect()->back()->with('status','Xóa đề tài thành công');
    }


    public function status($id)
    {
        $user = User::find($id);
        $user ->status = ($user->status == 1) ? 2 : 1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect()->route("user.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $user = User::find($id);
        $user ->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect()->route("user.trash")->with('status','Khôi phục thành công');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        
        $user->created_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect()->back()->with('status','Thêm thành viên thành công');
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
        $user = User::find($id);
        return view('backend.user.edit')->with(compact('user'));
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();
        return redirect()->back()->with('status','Cập nhật thành viên thành công');
    }

  
   
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->delete($id)) {
            return redirect()->route('user.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}