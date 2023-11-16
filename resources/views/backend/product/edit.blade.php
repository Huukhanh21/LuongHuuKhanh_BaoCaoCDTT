@section('title','Cập nhật sản phẩm')
@include('backend.menuadmin')


<form enctype="multipart/form-data" method="POST" action="{{route('product.update',[$product->id])}}">
    @method('PUT')
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="fs-3">CẬP NHẬT SẢN PHẨM KHO</strong>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col md-12 text-right">
                            <button name="CAPNHAT" type="submit" class="btn btn-sm btn-primary bg-primary">
                                <i class="fas fa-save"></i> Lưu[Cập nhật]
                            </button>
                            <a class="btn btn-sm btn-success" href="{{route('product.index')}}">
                                <i class="fas fa-arrow-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{(session('status'))}}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col md-9">
                            <div class="mb-3">
                                <label for="name">Tên sản phẩm</label>
                                <input name="name" id="name"  value="{{$product->name}}" type="text" class="form-control" required placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="mb-3">
                                <label for="price_buy">Giá nhập</label>
                                <input name="price_buy" id="price_buy"  value="{{$product->price}}" type="number" min="1"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="price">Giá bán</label>
                                <input name="price" id="price"  value="{{$product->price}}" type="number" min="1"  class="form-control">
                            </div>
                           
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input name="qty" id="qty" type="number"  value="{{$product->qty}}" min="1" class="form-control">
                            </div>
                         
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail"  value="" id="detail" class="form-control" required placeholder="Chi tiết sản phẩm">{{$product->detail}}</textarea>
                            </div>
                        </div>
                
                        <div class="col md-3">
                            <div class="mb-3">
                                <label for="">Danh mục</label>
                                <select name="category_id" id="" class="form-control">
                                    <option>Chọn thể loại</option>
                                    {!! $html_category_id !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Thương hiệu</label>
                                <select name="brand_id" id="" class="form-control">
                                    <option>Chọn thương hiệu</option>
                                    {!! $html_brand_id !!}
                                </select>
                            </div>
                        
                            
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input name="image" id="image" value="{{$product->image}}" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                </div>
                </div>
            </div>

            <!-- /.card-body -->

            <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
</x-app-layout>

</form>

