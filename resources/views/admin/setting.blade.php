@extends('layout.admin.admin')
@section('title','Setting')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Setting</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.company.index') }}">Company list</a></li>
            
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="content">

    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-body">
            <form role="form" action="{{ route('admin.setting') }}" method="post" enctype="multipart/form-data">
              @method('POST')
              @csrf
              <div class="form-group">
                <label for="exampleInputEmail1">Contact</label>
                <input type="text" name="contact" value="{{ $setting->contact }}" class="form-control"  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="address" value="{{ $setting->address }}"  class="form-control"  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" value="{{ $setting->email }}"  class="form-control"  >
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Facebook</label>
                <input type="text" name="facebook" value="{{ $setting->facebook }}"  class="form-control"  >
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Twitter</label>
                <input type="text" name="twitter" value="{{ $setting->twitter }}"  class="form-control"  >
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Pinterest</label>
                <input type="text" name="pinterest" value="{{ $setting->pinterest }}"  class="form-control"  >
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Instragram</label>
                <input type="text" name="instagram" value="{{ $setting->instagram }}"  class="form-control"  >
              </div>

            </div>

          </div>
        </div>

        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Submit</button>


        </div>
      </form>

    </div>


  </div>

  <!-- Main content -->


  <!-- /.content -->
</div>
@push('extra-scripts')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'description' );
</script>
@endpush

@endsection
