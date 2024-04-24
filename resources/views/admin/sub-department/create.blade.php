@extends('admin.layout.master')
@section('title', 'SubDepartment')
@section('breadcrumb', 'SubDepartment')
@section('breadcrumb-info', 'Create SubDepartment')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::open(['url' => '/admin/sub-department', 'class' => 'form-horizontal']) !!}

                @include ('admin.sub-department.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection