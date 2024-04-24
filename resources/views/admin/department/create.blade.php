@extends('admin.layout.master')
@section('title', 'Department')
@section('breadcrumb', 'Department')
@section('breadcrumb-info', 'Create Department')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::open(['url' => '/admin/department', 'class' => 'form-horizontal']) !!}

                @include ('admin.department.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection