@extends('admin.layout.master')
@section('title', 'Department')
@section('breadcrumb', 'Department')
@section('breadcrumb-info', 'Department Lists')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Departments
                        </h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ url('/admin/department/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Department">
                            <i class="bi bi-plus" aria-hidden="true"></i>Add New
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered dataTable no-footer requestDelete" id="departmentTable">
                                <thead class="table-light text-black">
                                    <tr>
                                        <th style="padding-left: 10px;">#</th>
                                        <th>Department Name</th>
                                        <th>Department Code</th>
                                        <th>Description</th>
                                        <th>Sort Order No.</th>
                                        <th>Status</th>
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
           
	        me.table = $("#departmentTable").DataTable({
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
                    url: "/admin/department/getData",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                        f.search = $('input[type="search"]').val();
                        f.status = $('select[name=status]').val();
                    }
                },
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', 'orderable' : false, 'searchable' : false, 'class' : 'ps-6'},
                    {data: 'department_name', name : 'department_name'},
                    {data: 'department_code', name : 'department_code'},
                    {data: 'description', name: 'description'},
                    {data: 'sort_order', name : 'sort_order'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', 'class': 'action text-center sticky'},
                ],
                "columnDefs": [
                    {
                        "targets": 2,
                        "className": "emphasized-column"
                    },
                    {
                        "targets": "_all",
                        "defaultContent": "-"
                    }
                ]
            });

            $('div.status').html(
                '<label> Status </label><div class="card-toolbar mx-4"><div class="d-flex justify-content-center w-125px"><select id="statusFilter" name="status" class="filters form-select form-select-sm" data-allow-clear=true><option></option><option value="all">All</option><option value="1">Enabled</option><option value="0">Disabled</option></select></div></div>'
            );

            var table = $('#departmentTable').DataTable();
            $("table.departmentTable_filterr").append($("#statusFilter"));

            $('input[type=search]').keyup(function(e) {
                table.draw();
                e.preventDefault();
            });

            $("#statusFilter").change(function(e) {
                table.draw();
                e.preventDefault();
            });
            
            $('#statusFilter').select2({
                placeholder: "Status",
                minimumResultsForSearch: -1,
            });
        });
    </script>
@endpush