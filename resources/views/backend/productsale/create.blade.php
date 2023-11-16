@include('backend.menuadmin')




<form enctype="multipart/form-data" method="POST" action="{{route('productsale.store')}}">
    @csrf
    <div class="content-wrapper">
        <x-app-layout>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <strong class="">THÊM SẢN PHẨM KHUYẾN MÃI</strong>
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
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6 text-right ">
                            <button name="THEM" type="submit" class="btn btn-sm btn-primary bg-primary">
                                <i class="fas fa-save"></i> Lưu[Thêm]
                            </button>
                            <a class="btn btn-sm btn-success" href="{{route('productsale.index')}}">
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
                                    <label for="">Tên sản phẩm</label>
                                    <select name="product" id="" class="form-control">
                                        <option>Chọn sản phẩm</option>
                                        @foreach($product as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                         
                      
                            <div class="mb-3">
                                <label for="pricesale">Giá khuyến mãi</label>
                                <input name="pricesale"  value="{{old('pricesale')}}" id="pricesale" type="number"   min="1" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input name="qty" id="qty" type="number"  value="{{old('qty')}}" min="1" class="form-control">
                            </div>
                         
                        </div>
                
                        <div class="col md-3">
                            <div class="mb-3">
                                <label for="date_begin">Ngày bắt đầu</label>
                                <input name="date_begin" id="date_begin"  value="{{old('date_begin')}}" type="datetime-local" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="date_end">Ngày kết thúc</label>
                                <input name="date_end" id="date_end"  value="{{old('date_end')}}" type="datetime-local" class="form-control">
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

            <!-- /.card-body -->

            <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>
</x-app-layout>

</form>


