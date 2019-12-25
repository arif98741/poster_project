@extends('layout.admin.admin')
@section('title','Blog')
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
        <h1>Blog List</h1>
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
                    <th>Title</th>
                    <th>Category</th>
                    <th>image</th>
                    <th>Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($blogs as $blog)
                  <tr>

                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->blog_category->name }}</td>

                    <td><img src="{{ url('storage/uploads/blog/'.$blog->image) }}" style="width: 100px; height: 100px; border-radius: 100%;" alt=""></td> 

                    <td>{{ substr($blog->description, 0,20) }}</td>
                    <td>
                      <a href="{{ route('admin.poster.edit',$blog->id) }}"><i class="fa fa-edit btn btn-primary"></i></a>



                        <form action="{{ url('admin/blog/'.$blog->id) }}" method="POST" >
                        @csrf
                        @method('DELETE') 
                        
                          <button class="btn btn-danger" type="submit" ><i class="fa fa-trash"></i></button>

                       </form> 

                      {{-- <a href="{{ route('admin.poster.destroy',$blog->id) }}"
                        onclick="return(confirm('are you sure to delete?'));event.preventDefault();
                        document.getElementById('blog-category-delete-form').submit();"><i class="fa fa-trash btn btn-danger"></i></a>
                        <form id="blog-category-delete-form" action="{{ route('admin.poster.destroy',$blog->id) }}" method="POST" style="display: none;">
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
