<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1">@if ($formMode === 'edit') Edit Staff @else Create Staff @endif</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='{{ url('/admin/staff')}}'"><i class="bi bi-x" aria-hidden="true"></i>
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
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('position_id') ? ' has-error' : '' }}">
                            <div class="list-title mb-3">
                                {!! Form::label('position_id', 'Position', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('position_id', $positions, null, ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'true', 'data-allow-clear' => 'true', 'placeholder' => 'Select Position', 'data-placeholder' => 'Select Position']) !!}
                            @if ($errors->has('position_id'))
                                <span class="help-block">{{ $errors->first('position_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="col-md-6">
                        <div class="form-group{{ $errors->has('position_id') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('position_id', 'Position', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('position_id', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('position_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div> -->
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('contact_number', 'Contact Number', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('contact_number', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">                    
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
