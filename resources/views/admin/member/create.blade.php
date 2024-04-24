@extends('admin.layout.master')
@section('title', 'Member')
@section('breadcrumb', 'Member')
@section('breadcrumb-info', 'Create Member')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>

                {!! Form::open(['url' => '/admin/member', 'class' => 'form-horizontal']) !!}

                @include ('admin.member.form', ['formMode' => 'create'])

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection