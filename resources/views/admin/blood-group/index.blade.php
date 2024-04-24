@extends('admin.layout.master')
@section('title', 'Blood Group')
@section('breadcrumb', 'Blood Group')
@section('breadcrumb-info', 'Blood Group Lists')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Blood Group
                        </h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ url('/admin/blood-group/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Blood Group">
                            <i class="bi bi-plus" aria-hidden="true"></i>Add New
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered dataTable no-footer requestDelete" id="bloodGroupTable">
                                <thead class="table-light text-black">
                                    <tr>
                                        <th style="padding-left: 10px;">#</th>
                                        <th>Blood Group</th>
                                        <th>Description</th>
                                        <th>Sort Order No.</th>
                                        <th>Status</th>
                                        <th>Last Update At</th>
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
           
	        me.table = $("#bloodGroupTable").DataTable({
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
                    url: "/admin/blood-group/getData",
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
                    {data: 'blood_group_name', name : 'blood_group_name'},                    
                    {data: 'description', name: 'description'},
                    {data: 'sort_order', name : 'sort_order'},
                    {data: 'status', name: 'status'},
                    {data: 'updated_at', name: 'updated_at'},
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

            var table = $('#bloodGroupTable').DataTable();
            $("table.bloodGroupTable_filter").append($("#statusFilter"));

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