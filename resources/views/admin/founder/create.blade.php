@extends('layout.admin.admin')
@section('title','Add Founder')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Founder</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.founder.index') }}">Founder list</a></li>
            
            <li class="breadcrumb-item active">Add Founder</li>
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
          <h3 class="card-title">Add Founder</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.founder.store') }}" method="post" enctype="multipart/form-data">
          @method('POST')
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Enter founder name</label>
              <input type="text" name="name" class="form-control"  >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Enter designation</label>
              <input type="text" name="designation" class="form-control"  >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Image</label>
              <input type="file" name="image" class="form-control"  >
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
