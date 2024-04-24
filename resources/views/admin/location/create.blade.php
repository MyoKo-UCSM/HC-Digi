@extends('admin.layout.master')
@section('title', 'Location')
@section('breadcrumb', 'Location')
@section('breadcrumb-info', 'Create Location')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::open(['url' => '/admin/location', 'class' => 'form-horizontal']) !!}

                @include ('admin.location.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection