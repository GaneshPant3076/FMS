@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                    </span>
<<<<<<<< HEAD:resources/views/backend/admin/faculty/edit.blade.php
                <h3 class="kt-portlet__head-title">Edit faculty</h3>
            </div>
        </div>
        {!! Form::model($faculty, [
            'route' => ['faculty.update', $faculty->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
        ]) !!}
        @include('backend.admin.faculty.form', ['formAction' => 'Update'])
========
                <h3 class="kt-portlet__head-title">Edit batch</h3>
            </div>
        </div>
        {!! Form::model($batch, [
            'route' => ['admin.batch.update', $batch->id],
            'method' => 'patch',
            'class' => 'kt-form kt-form--label-right',
        ]) !!}
        @include('backend.admin.batch.form', ['formAction' => 'Update'])
>>>>>>>> da9f1843622422f287ebb8c3ab606a2007d0c23d:resources/views/backend/admin/batch/edit.blade.php

        {!! Form::close() !!}
    </div>
@endsection
