<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Config;
use App\http\Controllers\Controller;



class ConfigController extends Controller
{

    public function index()
    {
        $config = Config::first();
        return view('backend.config.index')->with(compact('config'));
    }

 
    public function createupdate(Request $request)
    {
      if($request->id == ""){
        $config = new Config();
        $config->created_at = date('Y-m-d H:i:s');
      }else{
        $id = $request->id;
        $config = Config::find($id);
        $config->updated_at =  date('Y-m-d H:i:s');
      }
      $config->author = $request->author;
      $config->email = $request->email;
      $config->phone = $request->phone	;
      $config->zalo = $request->zalo;
      $config->facebook = $request->facebook;
      $config->address = $request->address	;
      $config->youtube = $request->youtube;
      $config->metadesc = $request->metadesc;

      $config->status = $request->status;
      $config->save();
        
      return redirect()->back()->with('status','Thay đổi thành công');
  

    }


}
