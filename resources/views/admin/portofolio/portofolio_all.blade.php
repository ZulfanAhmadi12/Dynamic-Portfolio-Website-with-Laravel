@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Portfolio Table</h4>

            </div>
        </div>
    </div>
    <!-- end page title -->
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Portfolio Data</h4>
                    <p class="card-title-desc">This is a All Portfolio data table. 
                        This table store a list of data about Portfolio which has been inserted into the system.
                    </p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th style="width: 140px;">Serial Number</th>
                            <th>Portfolio Name</th>
                            <th>Portfolio Title</th>
                            <th>Portfolio Image</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @php($i = 1)
                            @foreach($portofolio as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->portofolio_name }}</td>
                            <td>{{ $item->portofolio_title }}</td>
                            <td><img src="{{ asset($item->portofolio_image) }}" alt="" 
                                style="width: 60px; height: 50px;"></td>
                            <td>
                                <a href="{{ route('edit.portofolio', $item->id) }}" class="btn btn-info sm" title="Edit Data"><i
                                    class="fas fa-edit"></i> </a>
                                <a href="{{ route('delete.portofolio', $item->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete"><i
                                    class="fas fa-trash-alt"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    
</div> <!-- container-fluid -->
</div>

@endsection