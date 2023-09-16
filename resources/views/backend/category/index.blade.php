@extends('layouts.app')

@section('content')
@include('layouts.menu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <strong class="fs-3">TẤT CẢ THỂ LOẠI</strong>
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
<div class="  text-right">
    <a href="{{route('category.create')}}" class="btn btn-sm btn-success">
    <i class="fas fa-plus"></i> Thêm
    </a>
    <a href="" class="btn btn-sm btn-danger">
    <i class="fas fa-trash"></i>Thùng rác
    </a>
</div>
         </div>
          </div>
        <div class="card-body">
      

          <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 30px;">
                        <input type="checkbox" name="checkAll" />
                    </th>
                    <th class="text-center" style="width: 100px;">Hình</th>
                    <th>Tên thể loại</th>
                    <th>Mô tả</th>
                    <th class="text-center" style="width: 230px;">Ngày tạo</th>
                    <th class="text-center" style="width: 200px;">Chức năng</th>
                    <th class="text-center" style="width: 30px;">ID</th>
                </tr>
            </thead>
            <tbody>
           
                <tr>
                    <td class="text-center">
                        <input type="checkbox" name="checkID[]" value=""/>
                    </td>
                    <td class="text-center">
                    <img src="../public/images/category/" class="img-fluid" alt="hinh">
                    </td>
                    <td>
                       
                    </td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center">
                     
                        <a href="index.php?option=category&cat=status&id=" class="btn btn-sm btn-success">
                        <i class="fas fa-toggle-on"></i>
                         </a>
                    
                      <a href="index.php?option=category&cat=status&id=" class="btn btn-sm btn-danger">
                      <i class="fas fa-toggle-off"></i>
                      </a>
                    
                       
                        <a href="index.php?option=category&cat=edit&id=" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i>
                        </a>
                        <a href="index.php?option=category&cat=delete&id=" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                        </a>
                        
                    </td>
                    <td class="text-center" ></td>
                </tr>
            
            </tbody> 
          </table>
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

@endsection