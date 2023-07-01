@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">teacher</h3>
            </div>
        </div>
        <div>
            <h4 class="kt-portlet__head-title"> Name: {{ $teacher->name }}</h4><br>
            <h4> Batch: {{ $teacher->batch_id}}</h4><br>
            <h4> Faculty: {{ $teacher->faculty_id }}</h4><br>
            <h4> User_id: {{ $teacher->user_id }}</h4>

        </div>
    @endsection
