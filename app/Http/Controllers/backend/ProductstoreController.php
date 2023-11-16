<?php

namespace App\Http\Controllers\backend;
use App\http\Controllers\Controller;
use App\Models\Productstore;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productstore = Productstore::with('product')->where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.productstore.index')->with(compact('productstore'));
    }


    public function create()
    {
       $product = Product::where('status','!=',[0,2])->orderBy('id', 'DESC')->get();

        return view('backend.productstore.create')->with(compact('product'));
    }

    public function trash()
    {
        $productstore = Productstore::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.productstore.trash')->with(compact('productstore'));
    }

    public function delete($id)
    {
        $productstore = Productstore::find($id);
        $productstore->status = 0;
        $productstore->updated_at = date('Y-m-d H:i:s');
        $productstore->save();
        return redirect()->back()->with('status','Xóa sản phẩm thành công');
    }


    public function status($id)
    {
        $productstore = Productstore::find($id);
        $productstore ->status = ($productstore->status == 1) ? 2 : 1;
        $productstore->updated_at = date('Y-m-d H:i:s');
        $productstore->save();
        return redirect()->route("productstore.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $productstore = Productstore::find($id);
        $productstore ->status = 2;
        $productstore->updated_at = date('Y-m-d H:i:s');
        $productstore->save();
        return redirect()->route("productstore.trash")->with('status','Khôi phục thành công');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $data = $request->validate([
          
            'status' => 'required',
            'product' => 'required',
            'qty' => 'required',
     
        
            
           
          
        ]);
       $productstore = new Productstore();

       $productstore->qty = $data['qty'];
       $productstore->status = $data['status'];
       $productstore->created_at = date('Y-m-d H:i:s');
       $productstore->product_id = $data['product'];
        
       $productstore->save();
        return redirect()->back()->with('status','Thêm sản phẩm thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('status','!=',[0,2])->orderBy('id', 'DESC')->get();
        $productstore = Productstore::find($id);
        return view('backend.productstore.edit')->with(compact('product','productstore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
          
            'status' => 'required',
            'product' => 'required',
            'qty' => 'required',
          
           
            
        
           
          
        ]);
        $productstore = Productstore::find($id);
        $productstore->qty = $data['qty'];
        $productstore->status = $data['status'];
        $productstore->updated_at = date('Y-m-d H:i:s');
        $productstore->product_id = $data['product'];
        $productstore->save();
        return redirect()->back()->with('status','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    
        {
            $productstore = Productstore::find($id);
            if ($productstore->delete($id)) {
                return redirect()->route('productstore.trash')->with('status','Xóa khỏi thùng rác thành công');
        }
    
        }
    
}
