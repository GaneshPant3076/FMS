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
                <h4 class="kt-portlet__head-title">Name:{{ $user->name }}</h4><br>
                <h4> Email: {{ $user->email }}</h4><br>
                <h4> Number: {{ $user->number }}</h4><br>
                <h4> Role_id: {{ $user->role_id }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                {{-- <button type="reset"><a href="{{ url('admin/user') }}" class="btn btn-lg btn-primary">ok</a></button> --}}
                <a href="{{ url('admin/user') }}" type="btn" class="btn btn-primary">Ok</a>
            </div>
        </div>
    </div>
    </div>













    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">User</h3>
            </div>
        </div>
    </div>
@endsection
