@extends('admin.layout.master')
@section('title', 'Employee')
@section('breadcrumb', 'Employee')
@section('breadcrumb-info', 'Create/Edit Employee')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::model($employee, [
                    'method' => 'PATCH',
                    'url' => ['/admin/employee', $employee->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.employee.form', ['formMode' => 'edit'])

                {!! Form::close() !!}                
            </div>
        </div>
    </div>
@endsection
