<?php

namespace App\Http\Controllers\backend;
use App\http\Controllers\Controller;
use App\Models\Productsale;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $productsale = Productsale::with('product')->where('status','!=',0)->orderBy('id', 'DESC')->get();
        return view('backend.productsale.index')->with(compact('productsale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $product = Product::where('status','!=',[0,2])->orderBy('id', 'DESC')->get();

        return view('backend.productsale.create')->with(compact('product'));
    }

    public function trash()
    {
        $productsale = Productsale::where('status','=',0,)->orderby('id','DESC')->get();
        return view('backend.productsale.trash')->with(compact('productsale'));
    }

    public function delete($id)
    {
        $productsale = Productsale::find($id);
        $productsale->status = 0;
        $productsale->updated_at = date('Y-m-d H:i:s');
        $productsale->save();
        return redirect()->back()->with('status','Xóa thể loại thành công');
    }


    public function status($id)
    {
        $productsale = Productsale::find($id);
        $productsale ->status = ($productsale->status == 1) ? 2 : 1;
        $productsale->updated_at = date('Y-m-d H:i:s');
        $productsale->save();
        return redirect()->route("productsale.index")->with('status','Thay đổi trạng thái thành công');
    }

    public function restore($id)
    {
        
        $productsale = Productsale::find($id);
        $productsale ->status = 2;
        $productsale->updated_at = date('Y-m-d H:i:s');
        $productsale->save();
        return redirect()->route("productsale.trash")->with('status','Khôi phục thành công');
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
            'pricesale' => 'required',
            'date_begin' => 'required',
            'date_end' => 'required'
            
           
          
        ]);
       $productsale = new Productsale();
       $productsale->date_end = $data['date_end'];
       $productsale->date_begin = $data['date_begin'];
       $productsale->qty = $data['qty'];
       $productsale->pricesale = $data['pricesale'];
       $productsale->status = $data['status'];
       $productsale->created_at = date('Y-m-d H:i:s');
       $productsale->product_id = $data['product'];
        
       $productsale->save();
        return redirect()->back()->with('status','Thêm sản phẩm khuyến mãi thành công');

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
        $productsale = Productsale::find($id);
        return view('backend.productsale.edit')->with(compact('product','productsale'));
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
            'pricesale' => 'required',
            'date_begin' => 'required',
            'date_end' => 'required'
            
        
           
          
        ]);
        $productsale = Productsale::find($id);
        $productsale->date_end = $data['date_end'];
        $productsale->date_begin = $data['date_begin'];
        $productsale->qty = $data['qty'];
        $productsale->pricesale = $data['pricesale'];
        $productsale->status = $data['status'];
        $productsale->updated_at = date('Y-m-d H:i:s');
        $productsale->product_id = $data['product'];
         
        $productsale->save();
        return redirect()->back()->with('status','Cập nhật sản phẩm khuyến mãi thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    
        {
            $productsale = Productsale::find($id);
            if ($productsale->delete($id)) {
                return redirect()->route('productsale.trash')->with('status','Xóa khỏi thùng rác thành công');
        }
    
        }
    
}
