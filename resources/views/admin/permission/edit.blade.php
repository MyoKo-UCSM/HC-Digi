@extends('admin.layout.master')
@section('title', 'Permissions')
@section('breadcrumb', 'Permissions')
@section('breadcrumb-info', 'Edit Permission')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>

                {!! Form::model($permission, [
                    'method' => 'PATCH',
                    'url' => ['/admin/permission', $permission->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.permission.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection