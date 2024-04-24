@extends('admin.layout.master')
@section('title', 'Job Grade')
@section('breadcrumb', 'Job Grade')
@section('breadcrumb-info', 'Create/Edit Job Grade')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::model($grade, [
                    'method' => 'PATCH',
                    'url' => ['/admin/grade', $grade->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.grade.form', ['formMode' => 'edit'])

                {!! Form::close() !!}                
            </div>
        </div>
    </div>
@endsection
