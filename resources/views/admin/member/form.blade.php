<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1">@if ($formMode === 'edit') Edit Member @else Create Member @endif</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='{{ url('/admin/member')}}'"><i class="bi bi-x" aria-hidden="true"></i>
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
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('contact_number', 'Contact Number', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('contact_number', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('institution') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('institution', 'Institution', ['class' => 'control-label']) !!}
                            </div>
                            {!! Form::text('institution', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('institution', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('password', 'Password', ['class' => 'control-label required']) !!}
                            </div>
                            @php
                                $passwordOptions = ['class' => 'form-control'];
                            @endphp
                            {!! Form::password('password', $passwordOptions) !!}
                            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) !!}
                            </div>
                            @php
                                $confirmPasswordOptions = ['class' => 'form-control'];
                            @endphp
                            {!! Form::password('password_confirmation', $confirmPasswordOptions) !!}
                            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
