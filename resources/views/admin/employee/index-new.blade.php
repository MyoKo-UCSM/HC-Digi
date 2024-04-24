@extends('admin.layouts.master')
@section('title', 'Employees')
@section('breadcrumb', 'Employees')
@section('breadcrumb-info', 'All Employees')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-header border-0">
                    <div class="card-title">
                        <h3>All Projects</h3>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
                <form method="get" action="{{ route('employee.index') }}" id="employeeTable" class="filter-clear-form">
                    <div class="row" style="margin: 0 auto;">
                        <div class="card-header border-0 col-md-11">
                            <div class="card-title filter-style">
                                <div class="d-flex align-items-center position-relative my-1 me-3">
                                    <div class="input-group input-group">
                                        <input type="text" id="homefaq_search" class="search-box form-control" aria-label="Sizing example input" name="search" placeholder="Search...." aria-describedby="inputGroup-sizing-sm" style="background-color: #F3F6F9;max-width: 250px;" value="{{ request('search') ? request('search') : old('search') }}">
                                        @isset($keyword)<i class="bi bi-x" onclick="clearSearch()" style="position: absolute; top: 11px; right: 60px; font-size: 22px;"></i>@endisset
                                        <button class="btn btn-sm btn-secondary input-group-text" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="filter-section">
                                    <label for="" style="font-size: 12px;">Status</label>
                                    <div class="card-toolbar mx-4">
                                        <div class="d-flex justify-content-center" style="min-width: 150px;">
                                            <select class="form-select form-select-solid" id="status" name="status" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status" data-allow-clear="true">
                                                <option></option>
                                                <option value="all" {{ Request::get('status') == 'all' ? 'selected' : '' }}>All</option>
                                                <option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }}>Launched</option>
                                                <option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }}>Coming Soon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="filter-section">
                                    <label class="fs-7 fw-bold" for="category">Category</label>
                                    <div class="card-toolbar mx-4">
                                        <div class="d-flex justify-content-center" style="min-width: 150px;">
                                            <select class="form-select form-select-solid" id="category" name="category_id" data-control="select3" data-hide-search="true" data-placeholder="Category" data-kt-ecommerce-product-filter="category_id" data-allow-clear="true">
                                                <option></option>
                                                <option value="all" {{ Request::get('status') == 'all' ? 'selected' : '' }}>All</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-section">
                                    <label class="fs-7 fw-bold">Project Status</label>
                                    <div class="card-toolbar mx-4">
                                        <div class="d-flex justify-content-center min-w-150px">
                                            <select class="form-select form-select-solid" id="project_status" name="project_status" data-control="select2" data-hide-search="true" data-placeholder="Project Status" data-kt-ecommerce-product-filter="project_status" data-allow-clear="true">
                                                <option></option>
                                                <option value="all" {{ Request::get('project_status') == 'all' ? 'selected' : '' }}>All</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-section">
                                    <label class="fs-7 fw-bold">Start Date</label>
                                    <div class="card-toolbar mx-4">
                                        <div class="d-flex justify-content-center min-w-150px">
                                            <input type="date" name="start_date" value="{{ Request::get('start_date') }}" id="start_date" class="form-control form-control-solid flatpickr-input" placeholder="Start">
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-section">
                                    <label class="fs-7 fw-bold">End Date</label>
                                    <div class="card-toolbar mx-4">
                                        <div class="d-flex justify-content-center min-w-150px">
                                            <input type="date" name="end_date" value="{{ Request::get('end_date') }}" id="end_date" class="form-control form-control-solid flatpickr-input" placeholder="End">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-toolbar col-md-1 pt-4">
                            <!--call template to get table display-->
                            <x-table-display />
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-bordered gy-4 gs-7">
                            <thead class="table-light text-black text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>#</th>
                                    <th class="min-w-100px">Code</th>
                                    <th class="min-w-100px">Name</th>
                                    <th class="min-w-100px">Position</th>
                                    <th class="min-w-150px">Job Grade</th>
                                    <th class="min-w-100px">Department</th>
                                    <th class="min-w-150px">Team</th>
                                    <th class="min-w-150px">Mail</th>
                                    <th class="min-w-150px">Contact Number</th>
                                    <th class="min-w-100px sticky-header">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-square symbol-50px overflow-hidden me-3">
                                            <div class="symbol-label" style="width: 100px; height: 100px;">
                                                <img src="{{ $item->product ? asset($item->product->feature_image ) : '' }}" alt="" class="w-100">
                                            </div>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold mb-1">{{ $item->name ?? '' }}</a></p>
                                            <span class="text-muted">{{ $item->code }}</span>
                                        </div>
                                        <!--begin::User details-->
                                    </td>
                                    <td>{{ $item->grade_id ? $item->position->position_title : '-' }}</td>
                                    <td>{{ $item->grade_id ? $item->grade->grade_name : '-' }}</td>
                                    
                                    <td>Department</td>
                                    <td>Team</td>                                    
                                    <td>{{ $item->email ?? '' }}</td>
                                    <td> {{ $item->contact_number ?? ''}</td
                                    <td class="sticky">
                                        <a href="{{ url('admin/employee/'.$item->id."/edit") }}" title="Edit Employee">
                                            <button class="btn btn-icon btn-active-light-primary btn btn-primary w-30px h-30px">
                                                <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                            </button>
                                        </a>
                                        <form method="POST" action="{{ url('/admin/employee', $item->id) }}" class="deleteForm" style="display: inline;">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-icon btn-active-light-danger btn btn-danger w-30px h-30px show_confirm_delete" title='Delete'><i class="bi bi-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row my-3">
                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            {{ Admin::tableLength($project) }}
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="pagination-wrapper"> {!! $project->appends([
                                'search' => Request::get('search')
                                ])->links('pagination::bootstrap-4')->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('#category').select2();

    $('.statusChange').on('click', function() {
        $('#projectStatusUpdate').modal('show');

        var id = $(this).data('id');
        var project_status = $(this).data('status');

        $("input[name='project_id']").val(id);
        $('#projectStatusText').html(project_status);

    });
    $(document).ready(function() {
        $('#status').change(function() {
            $('#employeeTable').submit();
        })

        $('#category').change(function() {
            $('#employeeTable').submit();
        })

        $('#project_status').change(function() {
            $('#employeeTable').submit();
        })

        $('#start_date').change(function() {
            $('#employeeTable').submit();
        })

        $('#end_date').change(function() {
            $('#employeeTable').submit();
        })

        $('#display').on('change', function() {
            $('#employeeTable').submit();
        })
    });
</script>
@endpush