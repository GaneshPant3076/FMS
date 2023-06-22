@extends('admin.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">User</h3>
            </div>
        </div>
        <div>
            <h4 class="kt-portlet__head-title"> Name: {{ $user->name }}</h4><br>
            <h4> Email: {{ $user->email}}</h4><br>
            <h4> Number: {{ $user->number }}</h4><br>
            <h4> Role_id: {{ $user->role_id }}</h4>

        </div>
    @endsection
