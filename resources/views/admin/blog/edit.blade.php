@extends('layout.admin.admin')
@section('title','Update Blog')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Update Blog</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog list</a></li>
            
            <li class="breadcrumb-item active">Update Blog</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="col-md-8">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Update Blog</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Enter blog title</label>
              <input type="text" name="title" class="form-control" value=" {{  $blog->title }} " >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Select category</label>
              <select name="blog_category_id" id="" class="form-control" required="">
                <option value="" disabled="" selected="">---</option>
                @foreach($blog_categories as $blog_category)
                <option value="{{ $blog_category->id }}" @if($blog_category->id == $blog->blog_category_id) selected="" @endif>{{ $blog_category->name }}</option>

                @endforeach;
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Image</label>
              <input type="file" name="image" class="form-control"  >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <textarea name="description" cols="30" rows="3" class="form-control"> {{  $blog->description }} </textarea>
            </div>

            
          </div>

          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
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
@push('extra-scripts')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'description' );
</script>
@endpush

@endsection
