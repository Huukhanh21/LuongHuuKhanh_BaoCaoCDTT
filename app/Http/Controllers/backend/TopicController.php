<?php

namespace App\Http\Controllers\backend;

use App\Models\Topic;
use App\http\Controllers\Controller;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topic = Topic::where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.topic.index')->with(compact('topic'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.topic.create');
    }
    public function trash()
    {
        $topic = Topic::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.topic.trash')->with(compact('topic'));
    }

    public function delete($id)
    {
        $topic = Topic::find($id);
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->save();
        return redirect()->back()->with('status','Xóa đề tài thành công');
    }


    public function status($id)
    {
        $topic = Topic::find($id);
        $topic ->status = ($topic->status == 1) ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->save();
        return redirect()->route("topic.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $topic = Topic::find($id);
        $topic ->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->save();
        return redirect()->route("topic.trash")->with('status','Khôi phục thành công');
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
           
            'metadesc' => 'required',
            'status' => 'required',
            
           
          
        ]);
        $topic = new Topic();
        $topic->name = $data['name'];
        $topic->slug = Str::slug( $topic->name = $request->name,'-');
        $topic->metadesc= $data['metadesc'];
        $topic->status = $data['status'];
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->save();
        return redirect()->back()->with('status','Thêm đề tài thành công');
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
        $topic = Topic::find($id);
        return view('backend.topic.edit')->with(compact('topic'));
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
          
           'name'=>'required',
            'status' => 'required',
            'metadesc' => 'required',
  
          
        ]);
        $topic = Topic::find($id);
        $topic->name = $data['name'];
        $topic->slug = Str::slug( $topic->name = $request->name,'-');
        $topic->metadesc= $data['metadesc'];
        $topic->status = $data['status'];
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->save();
        return redirect()->back()->with('status','Cập nhật đề tài thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        $topic = Topic::find($id);
        if ($topic->delete($id)) {
            return redirect()->route('topic.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}