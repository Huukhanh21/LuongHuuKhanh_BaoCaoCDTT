<?php

namespace App\Http\Controllers\backend;
use App\Models\Contact;

use Illuminate\Http\Request;
use App\http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::where('status','!=',0, )->orderBy('id', 'DESC')->get();
        return view('backend.contact.index')->with(compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.contact.create');
    }
    /**
     *
     *trash
     */
    public function trash()
    {
        $contact = Contact::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.contact.trash')->with(compact('contact'));
    }
  /**
     *
     *delete
     */
    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact ->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->save();
        return redirect()->back()->with('status','Xóa thành công');
    }


    public function status($id)
    {
        $contact = Contact::find($id);
        $contact ->status = ($contact->status == 1) ? 2 : 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->save();
        return redirect()->route("contact.index")->with('status','Thay đổi trạng thái thành công');
    }


    public function restore($id)
    {
        
        $contact = Contact::find($id);
        $contact ->status = 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->save();
        return redirect()->route("contact.trash")->with('status','Khôi phục thành công');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
        $contact = new Contact();
        
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
      
        $contact->content = $request->content;
        $contact->created_at = date('Y-m-d H:i:s');

        $contact->save();
        return redirect()->back()->with('status','Thêm thành công');

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
        $contact = Contact::find($slug);
        return view('backend.contact.edit')->with(compact('contact'));

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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'address',
     
            'status' => 'required',
       

          
        ]);
        $contact = Contact::find($id);
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->address = $data['address'];
        $contact->content = $data['content'];
        $contact->status = $data['status'];
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->save();
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
        $contact = Contact::find($id);
        if ($contact->delete($id)) {
            return redirect()->route('contact.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
   
}
