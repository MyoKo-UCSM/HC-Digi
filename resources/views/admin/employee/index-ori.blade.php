@extends('admin.layout.master')
@section('title', 'Employee')
@section('breadcrumb', 'Employee')
@section('breadcrumb-info', 'Employee Lists')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-2">
                    <div class="col-md-9">
                        <h3 class="card-title">
                            Employee
                        </h3>
                    </div>
                    <div class="col-md-3 text-end">
                        <a href="{{ url('/admin/employee/create') }}" class="btn btn-primary btn-sm pull-right" title="Add New Employee">
                            <i class="bi bi-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-bordered dataTable no-footer requestDelete" id="employeeTable">
                                <thead class="table-light text-black">
                                    <tr>
                                        <th style="padding-left: 10px;">#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>JobGrade</th>
                                        <th>Department</th>
                                        <th>Team</th>                                                                           
                                        <th>Mail</th>
                                        <th>Contact Number</th>
                                         <!-- <th>Status</th>
                                        <th>Last Updated At</th> -->
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
            $('#employeeTable').DataTable({
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
                    url: "/admin/employee/getData",
                    type: 'POST',
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: function(f) {
                            f.search = $('input[type=search]').val();
                            f.status = $('select[name=status]').val();
                            f.department = $('select[name=department_id]').val();
                            f.grade = $('select[name=grade_id]').val();
                        }
                },
                
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', 'orderable' : false, 'searchable' : false, 'class' : 'ps-6'},
                    {data: 'employee_code', name: 'employee_code'},
                    {data: 'name', name: 'name'},
                    {data: 'position_id', name: 'position_id'},
                    {data: 'grade_id', name: 'grade_id'},
                    {data: 'department_id', name: 'department_id'},
                    {data: 'sub_department_names', name: 'sub_department_names'},                    
                    {data: 'email', name: 'email'},
                    {data: 'contact_number', name: 'contact_number'},
                    //{data: 'status', name: 'status'},
                    // {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', 'class': 'action text-center sticky'},
                ],
            });

            // $('div.status').html(
            //     '<label> Status </label><div class="card-toolbar mx-4"><div class="d-flex justify-content-center w-125px"><select id="statusFilter" name="status" class="filters form-select form-select-sm" data-allow-clear=true><option></option><option value="all">All</option><option value="1">Enabled</option><option value="0">Disabled</option></select></div></div>'
            // );
            $('div.status').html(
                '<label> Department456 </label><div class="card-toolbar mx-4"><div class="d-flex justify-content-center w-125px"><select id="departmentFilter" name="department_id" class="filters form-select form-select-sm" data-allow-clear=true><option></option>@foreach($departments as $departmentId => $departmentName)<option value="{{ $departmentId }}">{{ $departmentName }}</option>@endforeach</select></div></div>'
            );
            $('div.grade').html(
                '<label> Job Grade </label><div class="card-toolbar mx-4"><div class="d-flex justify-content-center w-125px"><select id="gradeFilter" name="grade_id" class="filters form-select form-select-sm" data-allow-clear=true><option></option>@foreach($grades as $gradeId => $gradeName)<option value="{{ $gradeId }}">{{ $gradeName }}</option>@endforeach</select></div></div>'
            );
                
            var table = $('#employeeTable').DataTable();
            $("table.employeeTable_filter").append($("#statusFilter"));

            var table = $('#employeeTable').DataTable();
            $("table.employeeTable_filter").append($("#departmentFilter"));

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

            $("#departmentFilter").change(function(e) {
                table.draw();
                e.preventDefault();
            });

            $('#departmentFilter').select2({
                placeholder: "Department",
                minimumResultsForSearch: -1,
            });
        });
    </script>
@endpush