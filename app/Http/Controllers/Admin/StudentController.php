<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    { $students = Student::latest()->paginate(10);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.student.index',compact('students'));



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year', 'id');
        $faculties = Faculty::all()->pluck('name', 'id');
        return view('admin.student.create',compact('users','batches','faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Student::create($request->all());
        return redirect()->route('student.index')->with('success','student is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year', 'id');
        $faculties = Faculty::all()->pluck('name', 'id');
        $student=Student::find($id);
        return view('admin.student.show',compact('student','users','batches','faculties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batches = Batch::all()->pluck('batch_year','id');
        $faculties=Faculty::all()->pluck('name','id');
        $users = User::all()->pluck('name','id');
        $student=Student::find($id);
        return view('admin.student.edit',compact('student','batches','faculties','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $student=Student::find($id);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success','info is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect()->route('student.index')->with('success','student is deleted successfully');
    }
}
