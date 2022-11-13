@extends('layouts.admin')
@section('title','Danh mục sản phẩm')
@section('maincontent')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>&nbsp; Xóa </button>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm </a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác </a>
                    </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body">
          <table class="table table-striped table-bordered">
          <thead>
                <tr class="bg-info">
                    <th class="text-center" style="width:20px">#</th>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Price_sale</th>
                    <th>Number</th>
                    <th>Gb</th>
                    <th>Color</th>
                    <th>Status</th>
                    <th>Function</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listsp as $row)
                <tr>
                    <td><input type="checkbox" name="checkboxid" value=""></td>
                    <td>{{$row->id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->category_id}}</td>
                    <td>{{$row->slug}}</td>  
                    <td><img src="/img/{{$row->img}}" style='width:68px;height:68px' alt=""></td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->price_slae}}</td>
                    <td>{{$row->number}}</td>
                    <td>{{$row->Gb}}</td>
                    <td>{{$row->color}}</td>
                    <td>{{$row->status}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-success"><i class="fas fa-toggle-off"></i> </a>
                        <a href="" class="btn btn-sm btn-info"><i class="far fa-edit"></i>  </a>
                        <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>  </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection