@extends('layouts.admin')
@section('title','Danh mục sản phẩm')
@section('maincontent')
<form action="{{ route ('category.update' ,['category'=>$category->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  @csrf
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
                        <strong class="text-danger">Cập nhập danh mục sản phẩm</strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Lưu lại </button>
                        <a href="{{route('category.index')}}" class="btn btn-sm btn-danger"><i class="fas fa-info"></i> Quay lại danh sách </a>
                    </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body">
            <div class="row">
            @includeIf('backend.message_aletr',['some'=>'data'])
                <div class="col-md-9">
                  <div class="md-3">
                      <label for="name">Tên danh mục</label>
                      <input type="text" name="name" value="{{ old('name',$category->name) }}" id="name" class="form-control" 
                      placeholder="Nhập tên danh mục">
                      @if( $errors ->has ('name'))
                      <div class="text-danger">
                          {{$errors->first('name')}}
                      </div>
                      @endif()
                  </div>
                  <br>
                  <div class="md-3">
                      <label for="metakey">Từ khóa</label>
                      <textarea name="metakey" id="metakey" class="form-control" placeholder="Nhập từ khóa tìm kiếm">{{ old('metakey',$category->metakey) }}</textarea>
                      @if( $errors ->has ('metakey'))
                      <div class="text-danger">
                          {{$errors->first('metakey')}}
                      </div>
                      @endif()
                    </div>
                  <br>
                  <div class="md-3">
                      <label for="metades">Mô tả</label>
                      <textarea name="metades" id="metades" class="form-control" placeholder="Nhập mô tả">{{ old('metakey',$category->metades) }}</textarea>
                      @if( $errors ->has ('metades'))
                      <div class="text-danger">
                          {{$errors->first('metades')}}
                      </div>
                      @endif()
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="md-3">
                        <label for="parent_id">Tên danh mục cha</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                          <option value="0">--Cấp cha--</option>
                          {!! $html_parent_id !!}
                        </select>
                  </div>
                  <br>
                  <!-- <div class="md-3">
                        <label for="sort_orders">Vị trí sắp xếp</label>
                        <select class="form-control" id="sort_orders" name="sort_orders">
                          <option value="0">--Vị trí--</option>
                          {!! $html_sort_orders !!}
                        </select>
                  </div> -->
                  <!-- <br> -->
                  <div class="md-3">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" id="status" name="status">
                          <option value="1">Hiện</option>
                          <option value="2">Ẩn</option>
                        </select>
                  </div>
                  <br>
                  <div class="md-3">
                        <label for="logo_img">Logo</label>
                        <input type="file" name="logo_img" value="{{ old('logo_img') }}" id="logo_img" class="form-control">
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
  <!-- /.content-wrapper -->
</form>
@endsection