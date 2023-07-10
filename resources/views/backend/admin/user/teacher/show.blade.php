@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <span class="kt-portlet__head-icon">
                            </span>
                            <h3 class="kt-portlet__head-title">User</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h4 class="kt-portlet__head-title">Name:{{ $teacher->user->name }}</h4><br>
                <h4> Email: {{ $teacher->user->email }}</h4><br>
                <h4> Number: {{ $teacher->user->number }}</h4><br>
                <h4> salary: {{ $teacher->salary }}</h4>
            </div>
        </div>
    </div>













@endsection
