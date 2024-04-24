@extends('admin.layout.master')
@section('title', 'Employee')
@section('breadcrumb', 'Employee')
@section('breadcrumb-info', 'Create Employee')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::open(['url' => '/admin/employee', 'class' => 'form-horizontal','files' => true]) !!}

                @include ('admin.employee.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection