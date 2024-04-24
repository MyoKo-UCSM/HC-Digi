@extends('admin.layout.master')
@section('title', 'Employee')
@section('breadcrumb', 'Employee')
@section('breadcrumb-info', 'Employee Lists')
@push('style')
    <style>
        #employeeTable_filter{
            display:none;
        }
        #employeeTable_length{
            float:left;
        }
    </style>
@endpush

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
                    <div class="card-header border-0 pt-6">
                        <div class="card-title filter-style">
                            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0 me-3">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                        </rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <input type="text" id="search" class="form-control form-control-solid w-250px ps-15"
                                    aria-label="Sizing example input" name="search" placeholder="Search...."
                                    aria-describedby="inputGroup-sizing-sm" value="{{ Request::get('search') }}">
                            </div>
                            <!-- <div class="filter-section">
                                <label for="" style="font-size: 14px">Status</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="status" id="status"
                                                data-control="select2" data-hide-search="true" data-placeholder="Status"
                                                data-kt-ecommerce-order-filter="status">
                                                <option value="all">All</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">Position</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="position" id="position"
                                                data-control="select2" data-hide-search="true" data-placeholder="position"
                                                data-kt-ecommerce-order-filter="position">
                                                <option value="all">All</option>
                                                @foreach($positions as $key=>$data)
                                                <option value="{{$key}}">{{$data}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">Department</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="department" id="department"
                                                data-control="select2" data-hide-search="true" data-placeholder="department"
                                                data-kt-ecommerce-order-filter="department">
                                                <option value="all">All</option>
                                                @foreach($departments as $key=>$data)
                                                <option value="{{$key}}">{{$data}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">Team</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="team" id="team"
                                                data-control="select2" data-hide-search="true" data-placeholder="team"
                                                data-kt-ecommerce-order-filter="team">
                                                <option value="all">All</option>
                                                @foreach($teams as $key=>$data)
                                                <option value="{{$key}}">{{$data}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-section">
                                <label for="" style="font-size: 14px">JobGrade</label>
                                <div class="card-toolbar mx-4">
                                    <div class="d-flex justify-content-center" data-kt-customer-table-toolbar="base">
                                        <div class="w-150px me-3">
                                            <select class="form-select form-select-solid" name="grade" id="grade"
                                                data-control="select2" data-hide-search="true" data-placeholder="grade"
                                                data-kt-ecommerce-order-filter="grade">
                                                <option value="all">All</option>
                                                @foreach($grades as $key=>$data)
                                                <option value="{{$key}}">{{$data}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                               
                                <a href="{{ url('/admin/employee/create') }}"><button type="button"
                                        class="btn btn-primary btn-sm"><i class="bi bi-plus" aria-hidden="true"></i>Add
                                        New</button></a>
                            </div>
                        </div> -->
                    </div>

                    <div class="card-body pt-0">
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
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600" id="">

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
        $(document).ready(function() {
            let selected = [];
            let me = this;
            me.table = $("#employeeTable").DataTable({
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
                        f.status = $('select[name=status]').val();
                        f.grade = $('select[name=grade]').val();
                        f.department = $('select[name=department]').val();
                        f.position = $('select[name=position]').val();
                        f.team = $('select[name=team]').val();
                        f.search = $('#search').val();
                    }
                },
                // columnDefs: [{
                //     orderable: false,
                //     className: 'select-checkbox',
                //     targets: 0
                // }],
                // select: {
                //     style: 'os',
                //     selector: 'td:first-child'
                // },
                // order: [
                //     [1, 'asc']
                // ],
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
                    {data: 'action', name: 'action', 'class': 'action text-center sticky'},
                ]
            });
            // $('#productTable tbody').on('click', 'tr', function() {
            //     // var id = $(this).find("td:first-child").text();
            //     // var index = $.inArray(id, selected);

            //     // if (index === -1) {
            //     //     selected.push(id);
            //     // } else {
            //     //     selected.splice(index, 1);
            //     // }
            //     // $(this).toggleClass('selected');
            // });

            $('#search').on('input', function(e) {
                var value = $(this).val();
                me.table.draw();
                e.preventDefault();
            });

            $('#status').on('change', function(e) {
                me.table.draw();
                e.preventDefault();
            });
            $('#grade').on('change', function(e) {
                me.table.draw();
                e.preventDefault();
            });
            $('#department').on('change', function(e) {
                me.table.draw();
                e.preventDefault();
            });
            $('#position').on('change', function(e) {
                me.table.draw();
                e.preventDefault();
            });
            $('#team').on('change', function(e) {
                me.table.draw();
                e.preventDefault();
            });
            
        });
    </script>
@endpush

