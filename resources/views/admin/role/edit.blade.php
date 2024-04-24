@extends('admin.layout.master')
@section('title', 'Role')
@section('breadcrumb', 'Role')
@section('breadcrumb-info', 'Edit Role')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>

                {!! Form::model($role, [
                    'method' => 'PATCH',
                    'url' => ['/admin/role', $role->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.role.form', ['formMode' => 'edit'])

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
@endsection
