<?php

namespace App\Http\Controllers\Admin;

use App\Models\teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\User;

class teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $teachers = teacher::latest()->paginate(10);
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('backend.admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year', 'id');
        $faculties = Faculty::all()->pluck('name', 'id');
        return view('backend.admin.teacher.create', compact('users', 'batches', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        teacher::create($request->all());
        return redirect()->route('teacher.index')->with('success', 'teacher is created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year', 'id');
        $faculties = Faculty::all()->pluck('name', 'id');
        $teacher = teacher::find($id);
        return view('backend.admin.teacher.show', compact('teacher', 'users', 'batches', 'faculties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batches = Batch::all()->pluck('batch_year', 'id');
        $faculties = Faculty::all()->pluck('name', 'id');
        $users = User::all()->pluck('name', 'id');
        $teacher = teacher::find($id);
        return view('backend.admin.teacher.edit', compact('teacher', 'batches', 'faculties', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $teacher = teacher::find($id);
        $teacher->update($request->all());
        return redirect()->route('teacher.index')->with('success', 'info is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = teacher::find($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'teacher is deleted successfully');
    }
}
