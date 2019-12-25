@extends('layout.admin.admin') @section('title','Reviews') @section('content')
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        @if(Session::has('success'))
        <p class="alert alert-success message">{{ Session::get('success') }}</p>
        @endif @if(Session::has('error'))
        <p class="alert alert-warning message">{{ Session::get('error') }}</p>
        @endif

        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Reviews</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Review</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
                                            <th>Serial</th>
                                            <th>Title</th>
                                            <th>Review By </th>
                                            <th>Company</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($reviews_data as $key=>$review)
                                        <tr>

                                            <td>{{ ++$key }}</td>
                                            <td>{{ $review->title }}</td>
                                            <td>{{ $review->reviewer->fullname }}</td>
                                            <td>{{ $review->company->company_name }}</td>
                                            <td>{{ date('h:i:s, d-m-Y',strtotime($review->created_at)) }}</td>
                                            <td> @if($review->status == 0) Approved @endif @if($review->status == 1) Denied @endif


                                            </td>
                                            <td>
                                                @if($review->status == 0)
                                                <a href="{{ url('admin/review/deny/'.$review->id) }}"><i class="fa fa-times btn btn-warning"></i></a> @endif @if($review->status == 1)
                                                <a href="{{ url('admin/review/approve/'.$review->id) }}"><i class="fa fa-check btn btn-success"></i></a> @endif



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
<link rel="stylesheet" href="{{asset('asset/back/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}"> @endpush @push('extra-scripts')
<script src="{{asset('asset/back/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('asset/back/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function() {
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
@endpush @endsection