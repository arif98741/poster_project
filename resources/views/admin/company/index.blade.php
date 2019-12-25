@extends('layout.admin.admin')
@section('title','Company')
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
        <h1> List</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"> list</li>
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
                    <th width="10%">Company Name</th>
                    <th width="10%">Website</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Logo</th>
                    <th width="30%">Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($companies as $company)
                  <tr>


                    <td>{{ $company->company_name }}</td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->phone }}</td>
                    <td><img src="{{ asset('storage/uploads/company/'.$company->image) }}" style="width: 100px; height: 100px; border-radius: 100%;" alt=""></td> 
                    <td>

                      @if($company->status == 1)

                      <a href="{{ url('admin/company/status/'.(0).'',$company->id) }}"><i class="fa fa-check btn btn-sm btn-success"></i></a>
                      @else
                       <a href="{{ url('admin/company/status/'.(1).'',$company->id) }}"><i class="fa fa-times btn btn-sm btn-warning"></i></a>
                      @endif

                      <a href="{{ route('admin.company.edit',$company->id) }}"><i class="fa fa-edit btn btn-sm btn-primary"></i></a>

                  {{--  <form action="{{ url('admin/company/'.$company->id) }}" method="POST" >
                        @csrf
                        @method('DELETE') 
                        
                          <button class="btn btn-danger" type="submit" >Delete</button>

                       </form> 
 --}}
{{-- 
                      <a href="{{ url('admin/founder/delete/'.$company->id) }}" onclick="return(confirm('are you sure to delete?'))"><i class="fa fa-trash btn btn-danger"></i></a>
 --}}
                    
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
