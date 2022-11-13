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
                      <!-- <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>&nbsp; Xóa</button> -->
                      
                      <form action="" class="form-inline" >
                    
                        <div class="form-group">
                          <input class="form-control" name="key" placeholder="Search">
                        </div>
                      
                        
                      
                        <button type="submit" class="btn btn-primary">
                          <i class= "fas fa-search"></i>
                        </button>
                      </form>
                      
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route ('category.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Thêm </a>
                        <a href="{{ route ('category.trash')}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Thùng rác </a>
                    </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body">
          @includeIf('backend.message_aletr',['some'=>'data'])
          <table class="table table-striped table-bordered">
            <thead>
                <tr class="bg-info">
                    <th class="text-center" style="width:20px">#</th>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th style='width:80px;'>Hình ảnh</th>
                    <th>Parent_id</th>
                    <th>Ngày tạo</th>
                    <th>Chức năng</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list_category as $category)
                <tr>
                    <td><input type="checkbox" name="checkboxid" value=""></td>
                    <td>{{++$i}}</td>
                    <td>{{$category->name}}</td>
                    <td><img style='width:80px;height:70px' src="{{asset('img/category/'.$category->logo_img)}}" alt=""></td>
                    <td>{{$category->parent_id}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        @if($category->status==1)
                          <a href="{{ route ('category.status',['category'=>$category->id]) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-toggle-on"></i> 
                          </a>
                        @else
                        <a href="{{ route ('category.status',['category'=>$category->id]) }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-toggle-off"></i> 
                          </a>
                        @endif()
                        
                        <a href="{{ route ('category.show',['category'=>$category->id]) }}" class="btn btn-sm btn-info"><i class="far fa-eye"></i> </a>
                        <a href="{{ route ('category.edit',['category'=>$category->id]) }}" class="btn btn-sm btn-primary"><i class="far fa-edit"></i>  </a>
                        <a href="{{ route ('category.delete',['category'=>$category->id]) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>  </a>
                    </td>
                    <td>{{$category->id}}</td>
                </tr>
                @endforeach
            </tbody>

          </table>
          <br>
          <div>
              {{$list_category->appends(request()->all())->links()}}
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