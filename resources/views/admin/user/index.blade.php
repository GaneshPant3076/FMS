@extends('admin.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">
                    User Listing
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ url('admin/user/create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Create
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer"
                width="100%" id="country-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Role_id</th>
                        <th>password</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->role_id }}</td>

                            {{-- <td>
                                {!! Form::open(['route' => ['job.destroy', $job->id], 'method' => 'delete']) !!}
                                <button class='btn btn-danger'>Delete</button>
                                {!! Form::close() !!} --}}
                            <a href="{{ url('admin/user/' . $user->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>

                            <a href="{{ url('admin/user', $user->id) }}" class="btn btn-sm btn-success">view</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
