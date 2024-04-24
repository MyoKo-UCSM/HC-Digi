<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1 form-header-class">@if ($formMode === 'edit') Edit Employee @else Create Employee @endif</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='{{ url('/admin/employee')}}'"><i class="bi bi-x" aria-hidden="true"></i>
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('employee_code') ? ' has-error' : ''}}">
                        <div class="list-title mb-3">
                            {!! Form::label('employee_code', 'Employee Code', ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::number('employee_code', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('employee_code', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('name', 'Employee Name', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>                    
                </div>
                <div class="row mt-4"> 
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('position_id') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('position_id', 'Position', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('position_id', $positions, null , ['class' => 'form-select', 'data-control' => 'select2', 'data-placeholder' => "Select Position", 'placeholder' => "Select Position", "data-kt-ecommerce-product-filter" => "position_id"]) !!}                           
                            @if ($errors->has('position_id'))
                                <span class="help-block text-danger">{{ $errors->first('position_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('grade_id') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('grade_id', 'Job Grade', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('grade_id', $grades, null, ['class' => 'form-control','data-control' => 'select2', 'data-hide-search' => 'false', 'data-allow-clear' => 'true', 'placeholder' => 'Select Job Grade', 'data-placeholder' => 'Select Job Grade']) !!}
                            @if ($errors->has('grade_id'))
                                <span class="help-block text-danger">{{ $errors->first('grade_id') }}</span>
                            @endif
                        </div>
                    </div>
                                       
                </div>
                <div class="row mt-4">
                    <!-- <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sub_department_id') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('sub_department_id',  'SubDepartment', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('sub_department_id',[],  isset($employee) ? $employee->sub_department_id : '', ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'true', 'data-allow-clear' => 'true', 'multiple' => 'multiple', 'placeholder' => 'Select SubDepartment', 'data-placeholder' => 'Select SubDepartment']) !!}
                            {!! $errors->first('sub_department_id', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('department_id', 'Department', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('department_id', $departments, isset($employee) ? $employee->department_id : '', ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'true', 'data-allow-clear' => 'true', 'placeholder' => 'Select Department', 'data-placeholder' => 'Select Department', 'id' => 'department_id']) !!}
                            {!! $errors->first('department_id', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('department_id', 'Department', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('department_id', $departments, null, ['class' => 'form-select','required' => 'required', 'data-control' => 'select2', 'data-allow-clear' => 'true', 'placeholder' => 'Select Department', 'data-placeholder' => 'Select Department']) !!}
                            @if ($errors->has('department_id'))
                                <span class="help-block">{{ $errors->first('department_id') }}</span>
                            @endif
                        </div>
                    </div>  -->
                   {{-- <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sub_department_id') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('sub_department_id[]', 'Team', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('sub_department_id[]', $subDepartments, isset($employee) ? $employee->sub_department_id : '', ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'true', 'data-allow-clear' => 'true', 'multiple' => 'multiple', 'placeholder' => 'Select Team', 'data-placeholder' => 'Select Team', 'id' => 'sub_department_id']) !!}
                            {!! $errors->first('sub_department_id', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sub_department_id') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('sub_department_id[]', 'Team', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('sub_department_id[]', [], isset($employee) ? $employee->sub_department_id : '', ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'true', 'data-allow-clear' => 'true', 'multiple' => 'multiple', 'placeholder' => 'Select Team', 'data-placeholder' => 'Select Team', 'id' => 'sub_department_id']) !!}
                            {!! $errors->first('sub_department_id', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                    
                </div>
                
                <div class="row mt-4">                    
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('email', 'Email', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('contact_number', 'Contact Number', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::number('contact_number', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('contact_number', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2">
                        <div class="form-group{{ $errors->has('nrc_code') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('nrc_code', 'Region/State', ['class' => 'control-label']) !!}
                            </div>
                            {{--{!! Form::select('nrc_code', $nrcCodes, isset($employee) ? $employee->nrc_code : '', ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'false', 'data-allow-clear' => 'true', 'placeholder' => 'Select NRC Code', 'data-placeholder' => 'Select NRC Code', 'id' => 'nrc_code']) !!} --}}
                            <select id="nrc_code" class="form-control">
                                <option selected>Select</option>
                                <option value="1">၁</option>
                                <option value="2">၂</option>
                                <option value="3">၃</option>
                                <option value="4">၄</option>
                                <option value="5">၅</option>
                                <option value="6">၆</option>
                                <option value="7">၇</option>
                                <option value="8">၈</option>
                                <option value="9">၉</option>
                                <option value="10">၁၀</option>
                                <option value="11">၁၁</option>
                                <option value="12">၁၂</option>
                                <option value="13">၁၃</option>
                                <option value="14">၁၄</option>
                            </select>
                            {!! $errors->first('nrc_code', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('name_mm') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('name_mm', 'NRC Name', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('name_mm', $nrcData, isset($employee) ? $employee->name_mm : '', ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'false', 'data-allow-clear' => 'true', 'placeholder' => 'Select Name', 'data-placeholder' => 'Select Name', 'id' => 'name_mm']) !!}
                            {!! $errors->first('name_mm', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>                    
                    <div class="col-md-2">
                        <div class="form-group{{ $errors->has('nrc_type') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                <label for="number_type" class="control-label required">Type</label>
                            </div>
                            <select id="number_type" class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="(နိုင်)">နိုင်</option>
                                <option value="(ဧည့်)">ဧည့်</option>
                                <option value="(ပြု)">ပြု</option>
                            </select>
                            {!! $errors->first('nrc_type', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group{{ $errors->has('nrc_number') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('nrc_number', 'Number', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('nrc_number', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('nrc_number', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('blood_group_id') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('blood_group_id', 'Blood Group', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::select('blood_group_id', $blood_groups, null, ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'false', 'data-allow-clear' => 'true', 'placeholder' => 'Select Blood Group', 'data-placeholder' => 'Select Blood Group']) !!}
                            @if ($errors->has('blood_group_id'))
                                <span class="help-block">{{ $errors->first('blood_group_id') }}</span>
                            @endif
                        </div>
                    </div>                              
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nrc_number') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('nrc_number', 'Number', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('nrc_number', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('nrc_number', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>                    
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>           
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sort_order') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('sort_order', 'Sort Order No', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::number('sort_order', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('sort_order', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div> 
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('nrc_copy') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                <label for="formFileLg" class="form-label">NRC Copy</label>
                            </div>
                            <!-- <label for="formFileLg" class="form-control form-control-lg" style="cursor: pointer;">Upload</label>
                            <input name="nrc_copy" class="form-control form-control-lg" id="formFileLg" type="file" style="display: none;"> -->
                            <input name="nrc_copy" class="form-control form-control-lg" id="formFileLg" type="file">
                            {!! $errors->first('nrc_copy', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('labor_copy') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                <label for="formFileLg" class="form-label">Labor Copy</label>
                            </div>
                            <input name="labor_copy" class="form-control form-control-lg" id="formFileLg" type="file">
                            {!! $errors->first('labor_copy', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('family_registration_copy') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                <label for="formFileLg" class="form-label">Family Registration Copy</label>
                            </div>
                            <input name="family_registration_copy" class="form-control form-control-lg" id="formFileLg" type="file">
                            {!! $errors->first('family_registration_copy', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('driving_license_copy') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                <label for="formFileLg" class="form-label">Driving Licence Copy</label>
                            </div>
                            <input name="driving_license_copy" class="form-control form-control-lg" id="formFileLg" type="file">
                            {!! $errors->first('driving_license_copy', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('employee_photo') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                <label for="formFileLg" class="form-label">Employee Photo</label>
                            </div>
                            <input name="employee_photo" class="form-control form-control-lg" id="formFileLg" type="file">
                            {!! $errors->first('employee_photo', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
               
                <!-- <div class="mb-3">
                    <label for="formFileLg" class="form-label">File input example</label>
                    <input name="file" class="form-control form-control-lg" id="formFileLg"
                            type="file">
                </div>
                <div class="mb-3">
                    <button type="submit" value="submit" class="btn btn-primary">Upload</button>
                </div> -->

                <!-- For Image Upload
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Employee Image</h3>
                    </div>
                    <div class="card-body">
                        <div class="list-title mb-3">
                            <label for="kt_ecommerce_add_product_store_template" class="form-label">
                                <span style="color: #B5B5C3">Image Size (410px*450px)</span>
                            </label>
                        </div>
                        <div class="panel-block">
                            <div class="form-group">
                                <div id="holder-mb-banner-image">
                                    @if(!empty($employee->mb_banner_image))
                                        <div class='lfmimage-container mb-banner-imagelfmc0'>
                                            <img src="{{ asset($blogpage->mb_banner_image) }}" class='lfmimage w-100' style="height: 20rem;">
                                            <div>
                                                <button type="button" onclick="removeImage('mb-banner-image',0)" class='btn btn-sm btn-danger w-100'>Remove</button>
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ asset('backend/media/blank-image.svg') }}" class="img-thumbnail">
                                    @endif
                                </div>
                                <div class="input-group mt-3">
                                    <span class="input-group-btn">
                                        <a id="lfm-mb-banner-image" data-input="mb-banner-image" data-preview="holder-mb-banner-image" class="btn btn-primary text-white">
                                            <i class="bi bi-image-fill"></i>Choose
                                        </a>
                                    </span>
                                    <input id="mb-banner-image" class="form-control" type="text" name="mb_banner_image" value="{{isset($blogpage) ? $blogpage->mb_banner_image : ''}}">
                                </div>  
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $("select").select2();
        
        $('#department_id').change(function() {
            var departmentId = $(this).val();
            if (departmentId) {
                $.ajax({
                    // url: '/admin/get-sub-departments',
                    url: '{{ route("getSubDepartments") }}',
                    type: 'POST',
                    data: {
                        department_id: departmentId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        var options = '<option value="">Select Team</option>';
                        $.each(response, function(id, name) {
                            options += '<option value="' + id + '">' + name + '</option>';
                        });
                        $('#sub_department_id').html(options);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#sub_department_id').html('<option value="">Select Team</option>');
            }
        });        
        
    });

</script>
<!-- <script>
    $(document).ready(function(){
        const department_id = $("#department_id").val();
        console.log(department_id);
        if(department_id) {
            getSubDepartments(department_id);
        }

        // CREATE
        $("#department_id").change(function (e) {
            e.preventDefault();
            getSubDepartments(e.target.value)
        });

    })

    function getSubDepartments(category_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/admin/ajax/sub-categories-by-category',
            data: {id: category_id},
            dataType: 'json',
            success: function (response) {
                if(response.success) {
                    const options = response.data.map(item => {
                        return `<option value="${item.id}"> ${item.sub_category_name} </option>`;
                    });
                    $('#sub_category_id').empty();
                    $('#sub_category_id').append(options);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
</script> --> 
<script>
    document.getElementById('nrc_code').addEventListener('change', function() {
        var nrcCodeId = this.value;
        // AJAX call to fetch related NRC Name
        $.ajax({
            url: '/admin/get-nrc-name/' + nrcCodeId,
            type: 'GET',
            success: function(response) {
                $('#nrc_name').val(response.name_en); // Update the value of the field
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>

@endpush
