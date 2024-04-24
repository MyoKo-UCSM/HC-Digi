@extends('admin.layout.master')
@section('title', 'SubDepartment')
@section('breadcrumb', 'SubDepartment')
@section('breadcrumb-info', 'Create/Edit SubDepartment')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::model($sub_department, [
                    'method' => 'PATCH',
                    'url' => ['/admin/sub-department', $sub_department->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.sub-department.form', ['formMode' => 'edit'])

                {!! Form::close() !!}                
            </div>
        </div>
    </div>
@endsection
