@extends('layout.admin.admin')
@section('title','Pricing')
@section('content')
<div class="content-wrapper">
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
       @if(Session::has('success')) 
     <p class="alert alert-success message">{{ Session::get('success') }}</p>
    @endif

    @if(Session::has('error')) 
     <p class="alert alert-warning message">{{ Session::get('error') }}</p>
    @endif
    
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pricing Plan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <section class="content">
      <div class="row">
        <div class="col-12">
          
          <!-- /.card -->

          <div class="card">
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Type</th>
                  <th>Duration</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Duration Unit</th>
                  <th>Ation</th>
                 
                </tr>
                </thead>
                <tbody>

                @foreach($packages as $package)
                    <tr>
                      <td>{{ $package->id }}</td>
                      <td>{{ $package->type }}</td>
                      <td>{{ $package->duration }}</td>
                      <td>{{ $package->description }}</td>
                      <td>{{ $package->price }}</td>
                      <td>{{ $package->duration_unit }}</td>
                      <td>
                       <a href="{{route('admin.package.edit',$package->id) }}"><i class="fa fa-edit btn btn-primary"></i></a> 


                       <form action="{{ url('admin/package/'.$package->id) }}" method="POST" >
                        @csrf
                        @method('DELETE') 
                        
                          <button class="btn btn-danger" type="submit" >Delete</button>

                       </form>

                        

                        

                        {{-- <a href="{{ route('admin.category.destroy',$category->id) }}"
                                        onclick="return(confirm('are you sure to delete?'));event.preventDefault();
                                                 document.getElementById('category-delete-form').submit();"><i class="fa fa-trash btn btn-danger"></i></a> --}}
                       {{--  <form id="category-delete-form" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
                           @method('DELETE')
                @csrf 
            {{ csrf_field() }}
        </form> --}}
 
                      </td>
                      
                    </tr>
                @endforeach 


                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
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
