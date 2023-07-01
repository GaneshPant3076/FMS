@extends('backend.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">
                    Teacher Listing
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ url('admin/teacher/create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Add Teacher
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
                        <th>User_id</th>
                        <th>Faculty_id</th>
                        <th>Salary</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($teachers as $teacher)
                     <tr>
                        <td>{{ $teacher->id }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->user_id }}</td>
                        <td>{{ $teacher->faculty_id }}</td>
                        <td>{{ $teacher->salary }}</td>

                        <td>
                            {{-- {!! Form::open(['url' => ['admin/teacher', $teacher->id], 'method' => 'delete']) !!}
                            <button class='btn btn-sm btn-danger'data-confirm-delete="true">Delete</button>
                            {!! Form::close() !!} --}}

                            <a href="{{ url('admin/teacher', $teacher->id) }}" class="btn btn-sm btn-success">view</a>
                            <a href="{{ url('admin/teacher/' . $teacher->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('teacher.destroy', $teacher->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
