<div class="row">
    <div class="col-md-8">
        <h2 class="fs-1">@if($formMode == "edit") Edit User  @else Create User @endif</h2>
    </div>
    <div class="col-md-4 text-end">
        <div class="form-group">
            <div class="form-group">
                <div class="float-left">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="bi bi-save"></i>
                        Save
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm cancel" onclick="window.location='{{ url('/admin/user')}}'"><i class="bi bi-x" aria-hidden="true"></i> 
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
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('name',  'Name', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('email', 'Email', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('password', 'Password', ['class' => 'control-label required']) !!}
                            </div>
                            @php
                                $passwordOptions = ['class' => 'form-control'];
                                if ($formMode === 'create') {
                                    $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
                                }
                            @endphp
                            {!! Form::password('password', $passwordOptions) !!}
                            {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
                            <div class="list-title mb-3">
                                {!! Form::label('role',  'Role', ['class' => 'control-label required']) !!}
                            </div>
                            {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'data-control' => 'select2', 'data-hide-search' => 'true', 'data-allow-clear' => 'true', 'placeholder' => 'Select Role', 'data-placeholder' => 'Select Role']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
