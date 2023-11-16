<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use App\Models\Customer;
use App\http\Controllers\Controller;



use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $order = Order::where('order.status', '!=', 0)
        ->join('customer', 'customer.id', '=', 'order.customer_id')
        ->select('order.id', 'order.name', 'order.email', 'order.phone',
            'order.address', 'order.note', 'order.status', 'order.created_at', 'customer.name')
        ->orderBy('order.created_at', 'asc')
        ->get();
        return view('backend.order.index')->with(compact('order'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.order.create');
    }
    public function trash()
    {
        $order = Order::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.order.trash')->with(compact('order'));
    }

    public function delete($id)
    {
        $order = Order::find($id);
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->save();
        return redirect()->back()->with('status','Xóa order thành công');
    }


    public function status($id)
    {
        $order = Order::find($id);
        $order ->status = ($order->status == 1) ? 2 : 1;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->save();
        return redirect()->route("order.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $order = Order::find($id);
        $order ->status = 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->save();
        return redirect()->route("order.trash")->with('status','Khôi phục thành công');
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
          
            'name' => 'required|unique:order|max:255',
            'status' => 'required',
            'user_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'note' => 'required',
           
          
        ]);
        $order = new Order();
        $order->name = $data['name'];
        $order->phone= $data['phone'];
        $order->user_id= $data['user_id'];
        $order->email= $data['email'];
        $order->address= $data['address'];
        $order->note= $data['email'];
        $order->status = $data['status'];
        $order->created_at = date('Y-m-d H:i:s');
    

    


        $order->save();
        return redirect()->back()->with('status','Thêm order thành công');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
  
        return view('backend.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('backend.order.edit')->with(compact('order'));
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
 // 'name' ,'status','user_id','phone','email' ,'address','note','created_at','updated_at'

            'name' => 'required|max:255',
            'status' => 'required',
            'user_id' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'note' => 'required',
           
          
        ]);
        $order = Order::find($id);
        $order->name = $data['name'];
        $order->phone= $data['phone'];
        $order->user_id= $data['user_id'];
        $order->email= $data['email'];
        $order->address= $data['address'];
        $order->note= $data['email'];
        $order->status = $data['status'];
        $order->updated_at = date('Y-m-d H:i:s');


        $order->save();
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
        $order = Order::find($id);
        if ($order->delete($id)) {
            return redirect()->route('order.trash')->with('status','Xóa khỏi thùng rác thành công');
    }

    }
}