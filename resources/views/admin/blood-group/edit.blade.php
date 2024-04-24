@extends('admin.layout.master')
@section('title', 'Blood Group')
@section('breadcrumb', 'Blood Group')
@section('breadcrumb-info', 'Create/Edit Blood Group')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div> -->

                {!! Form::model($blood_group, [
                    'method' => 'PATCH',
                    'url' => ['/admin/blood-group', $blood_group->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.blood-group.form', ['formMode' => 'edit'])

                {!! Form::close() !!}                
            </div>
        </div>
    </div>
@endsection
