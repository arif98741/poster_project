@extends('layout.admin.admin')
@section('title','Edit Blog Category')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Blog Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Blog Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.poster_category.update',$category->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter category name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="exampleInputEmail1" >
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
           

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- Horizontal Form -->
           
            <!-- /.card -->

          </div>
    </section>
      
    <!-- /.content -->
  </div>

@endsection
