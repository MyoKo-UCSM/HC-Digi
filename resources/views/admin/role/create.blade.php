@extends('admin.layout.master')
@section('title', 'Role')
@section('breadcrumb', 'Role')
@section('breadcrumb-info', 'Create Role')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>

                {!! Form::open(['url' => '/admin/role', 'class' => 'form-horizontal']) !!}

                @include ('admin.role.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
