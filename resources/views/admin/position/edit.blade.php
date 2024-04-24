@extends('admin.layout.master')
@section('title', 'Position')
@section('breadcrumb', 'Position')
@section('breadcrumb-info', 'Create/Edit Position')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::model($position, [
                    'method' => 'PATCH',
                    'url' => ['/admin/position', $position->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.position.form', ['formMode' => 'edit'])

                {!! Form::close() !!}                
            </div>
        </div>
    </div>
@endsection
