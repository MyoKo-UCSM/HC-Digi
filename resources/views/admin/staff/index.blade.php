@extends('admin.layout.master')
@section('title', 'Staffs')
@section('breadcrumb', 'Staffs')
@section('breadcrumb-info', 'Staff Lists')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-4">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Staff
                        </h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ url('/admin/staff/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Staff">
                            <i class="bi bi-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered dataTable no-footer requestDelete" id="staffTable">
                                <thead class="table-light text-black">
                                    <tr>
                                        <th style="padding-left: 10px;">#</th>
                                        <th>Name</th>
                                        <th>Position</th>                                        
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Enable</th>
                                        <th>Last Updated At</th>
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
            $('#staffTable').DataTable({
                dom: '<"border-0 "<"filter-style row w-100" <"col-md-8" "<""f> <"status filter-section ps-5 pt-4">> <"col-md-4" <"form-group"l>>>>rt<"bottom"ip>',
                "language": {
                    search: '<i class="bi bi-search overall-datatable-search" aria-hidden="true"></i>',
                    searchPlaceholder: 'Search....'
                },
                "searching": true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "/admin/staff/getData",
                    type: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                            f.search = $('input[type=search]').val();
                            f.status = $('select[name=status]').val();
                        }
                },
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', 'orderable' : false, 'searchable' : false, 'class' : 'ps-6'},
                    {data: 'name', name: 'name'},
                    {data: 'position.position_title', name: 'position.position_title'},
                    {data: 'contact_number', name: 'contact_number'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', 'class': 'action text-center sticky'},
                ],
            });

            $('div.status').html(
                '<label> Status </label><div class="card-toolbar mx-4"><div class="d-flex justify-content-center w-125px"><select id="statusFilter" name="status" class="filters form-select form-select-sm" data-allow-clear=true><option></option><option value="all">All</option><option value="1">Enabled</option><option value="0">Disabled</option></select></div></div>'
            );
                
            var table = $('#staffTable').DataTable();
            $("table.staffTable_filterr").append($("#statusFilter"));

            $('input[type=search]').keyup(function(e) {
                table.draw();
                e.preventDefault();
            });

            $("#statusFilter").change(function(e) {
                table.draw();
                e.preventDefault();
            });4
            
            $('#statusFilter').select2({
                placeholder: "Status",
                minimumResultsForSearch: -1,
            });
        });
    </script>
@endpush