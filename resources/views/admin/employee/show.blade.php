@extends('admin.layout.master')
@section('title', 'Employee Detail')
@section('breadcrumb', 'Employee Detail')
@section('breadcrumb-info', 'Employee Detail')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h2 class="fs-2">Employee Details</h2>
        </div>
        <div class="col-md-3 text-end">
            <a href="{{ url('/admin/employee') }}" class="btn btn-primary btn-sm pull-right" title="Add New Employee">
            <i class="bi bi-arrow-left-short"></i> Back
            </a>
        </div>
    </div>
    <div class="card card-flush pt-3 mb-xl-10 mt-5">
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title">
                <h2 class="fw-bolder">General Information</h2>
            </div>
            
            <!--begin::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Section-->
            <div class="mb-10">
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">
                    <!--begin::Row-->
                    <div class="flex-equal me-5">
                        <!--begin::Details-->
                        <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                            <!--begin::Row-->
                            <tbody>
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Employee Code</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->employee_code ?? "" }}
                                    </td>
                                    <td class="text-gray-400 min-w-175px w-175px">Employee Name</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->name ?? "" }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Email</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->email ?? "" }}
                                    </td>
                                    <td class="text-gray-400 min-w-175px w-175px">Contact Number</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->contact_number ?? "" }}
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Position</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->position_id ? $employee->position->position_title : "" }}
                                    </td>
                                    <td class="text-gray-400 min-w-175px w-175px">Job Grade</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->grade_id ? $employee->grade->grade_name : "" }}
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Department</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->department_id ? $employee->department->department_name : "" }}
                                    </td>
                                    <td class="text-gray-400 min-w-175px w-175px">Team</td>
                                    <td class="text-gray-800 min-w-200px">
                                        @foreach($employee->subDepartments as $subDepartment)
                                            {{ $subDepartment->sub_department_name }} 
                                            {{-- Add a comma and space if it's not the last sub-department --}}
                                            @if (!$loop->last)
                                                , 
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Blood Group</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->blood_group_id ? $employee->bloodGroup->blood_group_name : "" }}
                                    </td>
                                    <td class="text-gray-400 min-w-175px w-175px">Address</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->address ?? '' }}
                                    </td>
                                   
                                </tr>
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Comments</td>
                                    <td class="text-gray-800 min-w-200px">
                                        {{ $employee->comments ?? "-" }}
                                    </td>
                                    <td class="text-gray-400">Created Date</td>
                                    <td class="text-gray-800"> {{ $employee->created_date ? date('d-m-Y', strtotime($employee->created_date)) : "" }} </td>
                                </tr>
                                <!--end::Row-->
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">NRC File</td>
                                    <td class="text-gray-800 min-w-200px">
                                        @if($employee->nrc_copy)
                                            <?php $fileName = basename($employee->nrc_copy); ?>
                                            <a href="{{ asset($employee->nrc_copy) }}" target="_blank">{{ $fileName }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-gray-400 min-w-175px w-175px">Labor File</td>
                                    <td class="text-gray-800 min-w-200px">
                                        @if($employee->labor_copy)
                                            <?php $fileName = basename($employee->labor_copy); ?>
                                            <a href="{{ asset($employee->labor_copy) }}" target="_blank">{{ $fileName }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">Family Registration File</td>
                                    <td class="text-gray-800 min-w-200px">
                                        @if($employee->family_registration_copy)
                                            <?php $fileName = basename($employee->family_registration_copy); ?>
                                            <a href="{{ asset($employee->family_registration_copy) }}" target="_blank">{{ $fileName }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-gray-400 min-w-175px w-175px">Driving Licence</td>
                                    <td class="text-gray-800 min-w-200px">
                                        @if($employee->driving_license_copy)
                                            <?php $fileName = basename($employee->driving_license_copy); ?>
                                            <a href="{{ asset($employee->driving_license_copy) }}" target="_blank">{{ $fileName }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-gray-400 min-w-175px w-175px">EmployeePhoto </td><br/>
                                    <td class="text-gray-800 min-w-200px">
                                        @if($employee->employee_photo)
                                            <img class="" src="{{ asset("$employee->employee_photo") }}" alt="{{ $employee->name ?? '-' }}" width="100px" height="auto">
                                        @else
                                            <img src="{{ asset('images/no_image.jpg') }}" width="auto" height="50px">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                            <!-- <a href="javascript:void(0)" class="show-contract" data-toggle="modal" data-target="#contractModal">View Contract</a> -->
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
    // $('.orderStatusChange').on('click', function() {
    //     $('#orderStatusUpdate').modal('show');
    //     $('#deliveryStatusUpdate').modal('hide');
    //     var id = $(this).data('id');
    //     var order_status = $(this).data('status');

    //     $("input[name='project_id']").val(id);
    //     $('#orderStatusText').html(order_status);

    // });
</script>

@endpush