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
                    <div class="col-md-9">
                        <strong class="text-danger">Chi tiết danh mục sản phẩm</strong>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route ('category.edit',['category'=>$category->id]) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Sửa </a>
                        <a href="{{ route ('category.delete',['category'=>$category->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Xóa </a>
                        <a href="{{route('category.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-info"></i> Quay lại danh sách </a>
                    </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">
            <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-info">
                    <th>Tên trường</th>
                    <th>Giá trị</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Id</td>
                    <td>{{$category->id}}</td>
                </tr>
                <tr>
                    <td>name</td>
                    <td>{{$category->name}}</td>
                </tr>
                <tr>
                    <td>slug</td>
                    <td>{{$category->slug}}</td>
                </tr>
                <tr>
                    <td>parent_id</td>
                    <td>{{$category->parent_id}}</td>
                </tr>
                <tr>
                    <td>sort_orders</td>
                    <td>{{$category->sort_orders}}</td>
                </tr>
                <tr>
                    <td>metakey</td>
                    <td>{{$category->metakey}}</td>
                </tr>
                </tr>
                <tr>
                    <td>metades</td>
                    <td>{{$category->metades}}</td>
                </tr>
                <tr>
                    <td>status</td>
                    <td>{{$category->status}}</td>
                </tr>
                <tr>
                    <td>created_at</td>
                    <td>{{$category->created_at}}</td>
                </tr>
                <tr>
                    <td>updated_at</td>
                    <td>{{$category->updated_at}}</td>
                </tr>
            </tbody>

          </table>
            </div>
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