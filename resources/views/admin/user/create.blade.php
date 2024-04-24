@extends('admin.layout.master')
@section('title','User')
@section('breadcrumb','User')
@section('breadcrumb-info', 'Create User')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>

                {!! Form::open(['url' => '/admin/user', 'class' => 'form-horizontal']) !!}

                @include ('admin.user.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
