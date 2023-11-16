<?php

namespace App\Http\Controllers\backend;

use App\Models\Customer;
use App\http\Controllers\Controller;
use App\Http\Requests\CustomerStoreRequest;



use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $customer = Customer::where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.customer.index')->with(compact('customer'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customer.create');
    }
    public function trash()
    {
       $customer = Customer::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.customer.trash')->with(compact('customer'));
    }

    public function delete($id)
    {
       $customer = Customer::find($id);
       $customer->status = 0;
       $customer->updated_at = date('Y-m-d H:i:s');
       $customer->save();
        return redirect()->back()->with('status','Xóa thành công');
    }


    public function status($id)
    {
       $customer = Customer::find($id);
       $customer ->status = ($customer->status == 1) ? 2 : 1;
       $customer->updated_at = date('Y-m-d H:i:s');
       $customer->save();
        return redirect()->route("customer.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
       $customer = Customer::find($id);
       $customer ->status = 2;
       $customer->updated_at = date('Y-m-d H:i:s');
       $customer->save();
        return redirect()->route("customer.trash")->with('status','Khôi phục thành công');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
      
        
       $customer = new Customer();
       $customer->name = $request->name;
       $customer->email = $request->email;
       $customer->phone = $request->phone;
       $customer->address = $request->address;
       $customer->username = $request->username;
       $customer->password = $request->password;
       $customer->gender = $request->gender;
      
       $customer->status = $request->status;
        
       $customer->created_at = date('Y-m-d H:i:s');
       $customer->save();
        return redirect()->back()->with('status','Thêm khách hàng thành công');
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
       $customer = Customer::find($id);
        return view('backend.customer.edit')->with(compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerStoreRequest $request, $id)
    {
       $customer = Customer::find($id);
       $customer->name = $request->name;
       $customer->email = $request->email;
       $customer->address = $request->address;
       $customer->username = $request->username;
       $customer->password = $request->password;
       $customer->gender = $request->gender;
       $customer->status = $request->status;
       $customer->updated_at = date('Y-m-d H:i:s');
       $customer->save();
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
       $customer = Customer::find($id);
        if ($customer->delete($id)) {
            return redirect()->route('customer.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}