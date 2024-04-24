@extends('admin.layout.master')
@section('title', 'Staff')
@section('breadcrumb', 'Staff')
@section('breadcrumb-info', 'Create Staff')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>

                {!! Form::open(['url' => '/admin/staff', 'class' => 'form-horizontal']) !!}

                @include ('admin.staff.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection