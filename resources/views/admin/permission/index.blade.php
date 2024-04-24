@extends('admin.layout.master')
@section('title', 'Permissions')
@section('breadcrumb', 'Permissions')
@section('breadcrumb-info', 'Permission Lists')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-4">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Permission
                        </h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ url('/admin/permission/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Permission">
                            <i class="bi bi-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered dataTable no-footer requestDelete" id="permissionTable">
                                <thead class="table-light text-black">
                                    <tr>
                                        <th style="padding-left: 10px;">#</th>
                                        <th>Title</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            let me = this;
           
	        me.table = $("#permissionTable").DataTable({
                dom: '<"top"fl>rt<"bottom"ip><"clear">',
                    "language": {
                    search: '<i class="fa fa-search overall-datatable-search"></i>',
                    searchPlaceholder: 'Search....'
                    },
                "searching": true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/permission/getData",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                            f.search = $('input[type="search"]').val();
                        }
                },
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', 'orderable' : false, 'searchable' : false, 'class' : 'ps-6'},
                    {data: 'title', 'name' : 'title'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', 'class': 'action text-center sticky'},
                ],
            });
        });
    </script>
@endpush