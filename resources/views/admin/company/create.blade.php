@extends('layout.admin.admin')
@section('title','Add Company')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Company</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">Company list</a></li>
            
            <li class="breadcrumb-item active">Add Company</li>
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
          <h3 class="card-title">Add Company</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ route('admin.company.store') }}" method="post" enctype="multipart/form-data">
          @method('POST')
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Enter Company name</label>
              <input type="text" name="company_name" class="form-control"  >
            </div>
              <div class="form-group">
              <label for="exampleInputEmail1">Enter Description</label>
              <input type="text" name="description" class="form-control"  >
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Enter website </label>
              <input type="text" name="website" class="form-control"  >
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Enter Contact Number</label>
              <input type="text" name="phone" class="form-control"  >
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Enter Address</label>
              <input type="text" name="address" class="form-control"  >
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
