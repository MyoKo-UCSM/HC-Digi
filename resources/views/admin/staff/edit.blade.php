@extends('admin.layout.master')
@section('title', 'Staff')
@section('breadcrumb', 'Staff')
@section('breadcrumb-info', 'Edit Staff')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row mx-1">
                    @if ($errors->any())
                        <x-errors :errors="$errors" />
                    @endif
                </div>

                {!! Form::model($staff, [
                    'method' => 'PATCH',
                    'url' => ['/admin/staff', $staff->id],
                    'class' => 'form-horizontal'
                ]) !!}

                @include ('admin.staff.form', ['formMode' => 'edit'])

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection