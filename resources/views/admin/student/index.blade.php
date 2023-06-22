@extends('admin.layouts.app')
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                </span>
                <h3 class="kt-portlet__head-title">
                    student Listing
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-actions">
                    <a href="{{ url('admin/student/create') }}" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Admit student
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
                        <th>Batch_id</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($students as $student)
                     <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->user_id }}</td>
                        <td>{{ $student->faculty_id }}</td>
                        <td>{{ $student->batch_id }}</td>

                        <td>
                            {{-- {!! Form::open(['url' => ['admin/student', $student->id], 'method' => 'delete']) !!}
                            <button class='btn btn-sm btn-danger'data-confirm-delete="true">Delete</button>
                            {!! Form::close() !!} --}}

                            <a href="{{ url('admin/student', $student->id) }}" class="btn btn-sm btn-success">view</a>
                            <a href="{{ url('admin/student/' . $student->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('student.destroy', $student->id) }}" class="btn btn-sm btn-danger" data-confirm-delete="true">Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
