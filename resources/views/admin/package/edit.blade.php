@extends('layout.admin.admin')
@section('title','update Pricing')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Pricing Plan </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">update Pricing Plan</li>
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
              
              </div>
              <!-- /.card-header -->
              <!-- form start -->
        <form role="form" action="{{ route('admin.package.update',$package->id) }}" method="post">
              @method('PUT')
                @csrf   
                <div class="card-body">
                  <div class="form-group">
                   <label for="exampleInputEmail1">Pricing Plan Type </label>
                   <select name="type"  class="form-control" required="">
                     <option  selected="" disabled="">Select option</option> 
             

                    <option value="Standard" @if($package->id = "Standard") selected="" @endif>Standard</option> 
                    <option value="Extended" @if($package->id = "Extended") selected="" @endif>Extended</option> 
                    <option value="Premium" @if($package->id = "Premium") selected="" @endif>Premium</option> 

                  
                   
                     </select>
                   
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Duration </label>
                    <input type="number" name="duration"  value="{{ $package->duration }}" class="form-control" id="exampleInputEmail1" >
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Description </label>
                    <input type="text" name="description"  value="{{ $package->description }}" class="form-control" id="exampleInputEmail1" >

                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">price </label>
                    <input type="number" name="price" value="{{ $package->price }}" class="form-control" id="exampleInputEmail1" >
                  </div>


                   <div class="form-group">
                    <label for="exampleInputEmail1">Duration Unit </label>
                    <input type="number" name="duration_unit" value="{{ $package->duration_unit }}" class="form-control" id="exampleInputEmail1" >
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
  @push('extra-css')
    <link rel="stylesheet" href="{{asset('asset/back/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush
  @push('extra-scripts')
    <script src="{{asset('asset/back/plugins/datatables/jquery.dataTables.js')}}"></script>
      <script src="{{asset('asset/back/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
      <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script>
@endpush
@endsection
