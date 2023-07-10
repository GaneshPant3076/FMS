@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
<<<<<<<< HEAD:resources/views/backend/admin/faculty/create.blade.php
                <h3 class="kt-portlet__head-title">Create User</h3>
            </div>
        </div>
        {!! Form::open(['route' => 'faculty.store', 'class' => 'kt-form kt-form--label-right', 'method' => 'post']) !!}
        @include('backend.admin.faculty.form', ['formAction' => 'Save'])
========
                <h3 class="kt-portlet__head-title">Create section</h3>
            </div>
        </div>
        {!! Form::open(['route' => 'admin.section.store', 'class' => 'kt-form kt-form--label-right', 'method' => 'post']) !!}
        @include('backend.admin.section.form', ['formAction' => 'Save'])
>>>>>>>> da9f1843622422f287ebb8c3ab606a2007d0c23d:resources/views/backend/admin/section/create.blade.php
        {!! Form::close() !!}
    </div>
@endsection
