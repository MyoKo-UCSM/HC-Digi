<div class="row">
    <div class="col-md-8">
        <h2 class="fs-3 form-header-class">@if ($formMode === 'edit') Edit SubDepartment @else Create SubDepartment @endif</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='{{ url('/admin/sub-department')}}'"><i class="bi bi-x" aria-hidden="true"></i>
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
                        <div class="form-group{{ $errors->has('sub_department_name') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('sub_department_name', 'Team Name', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::text('sub_department_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('sub_department_name', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('department_id', 'Department', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'true', 'data-allow-clear' => 'true', 'placeholder' => 'Select Position', 'data-placeholder' => 'Select Position']) !!}
                            @if ($errors->has('department_id'))
                                <span class="help-block text-danger">{{ $errors->first('department_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('description', 'Description.', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('description', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('sort_order', 'Sort Order No', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::number('sort_order', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('sort_order', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>