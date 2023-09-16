@extends('layouts.app')

@section('content')


<form action="index.php?option=brand&cat=process"method="post" enctype="multipart/form-data">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <strong class="fs-3">THÊM DANH MỤC</strong>
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
              <button name="THEM" type="submit" class="btn btn-sm btn-primary">
                <i class="fas fa-save"></i> Lưu[Thêm]
              </button>
              <a class="btn btn-sm btn-success" href="{{route('category.index')}}">
                <i class="fas fa-arrow-left"></i> Quay về danh sách
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
    <div class="row">
        <div class="col-md-7">
            <div class="mb-3">
                <label for="name">Tên thể loại</label>
                <input name="" id="name" type="text" class="form-control" required placeholder="Nhập tên thể loại">
            </div>
            <div class="mb-3">
                <label for="meta_desc">Mô tả</label>
                <textarea name="" id="meta_desc" class="form-control" rows="3" required placeholder=""></textarea>
            </div>
        
        </div>

        <div class="col-md-4">
            <div class="mb-3">
                <label for="sort_order">Sắp xếp</label>
                <select name="" id="sort_order" class="form-control">
                    <option value="0">--Chọn vị trí--</option>
                 
                </select>
            </div>
            <div class="mb-3">
                <label for="image">Hình ảnh</label>
                <input name="" id="image" type="file" class="form-control">
            </div>
            <div class="mb-3">
                <label for="status">Trạng thái</label>
                <select name="" id="status" class="form-control">
                    <option value="1">Xuất bản</option>
                    <option value="2">Chưa xuất bản</option>
                </select>
            </div>
        </div>
    </div>
</div>

        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  </form>

@endsection