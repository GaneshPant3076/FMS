<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Constants\RoleConstant;
use App\Models\Batch;
use App\Models\Section;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;



class StudentController extends Controller
{
    private $view = 'backend.admin.user.student.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->Datatable();
        }
        return view($this->view . 'index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all()->pluck('name', 'id');
        $semesters = Semester::all()->pluck('name','id');
        $sections= Section::all()->pluck('name','id');

        $batches= Batch::all()->pluck('batch_year','id');
        $users= User::all()->pluck('name','id');

        return view($this->view . 'create', compact('faculties','semesters','sections','batches','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userData = array_merge(
            $request->input('user'),
            [
                'role_id' => RoleConstant::STUDENT_ID,
                'password' => bcrypt('password')
            ]
        );
        $studentData = $request->except(
            [
                'user',
                '_token'
            ],


        );


        DB::beginTransaction();
        $user = User::create($userData);
        $user->student()->create($studentData);
        Db::commit();

        return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id)->load(['user', 'faculty','batch','semester','section']);

        return view($this->view . 'show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculties = Faculty::all()->pluck('name', 'id');
        $semesters = Semester::all()->pluck('name','id');
        $sections= Section::all()->pluck('name','id');

        $batches= Batch::all()->pluck('batch_year','id');
        $users= User::all()->pluck('name','id');

        return view($this->view . 'create', compact('faculties','semesters','sections','batches','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);
        $userData = $request->input('user');
        $studentData = $request->except(
            [
                'user',
                '_token'
            ]
        );
        DB::beginTransaction();
        $student->user()->update($userData);
        $student->update($studentData);
        Db::commit();

        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        DB::beginTransaction();
        $student->user()->delete();
        $student->delete();
        DB::commit();

        return redirect()->route('admin.student.index');
    }
    public function Datatable()
    {
        $student = Student::query()->with(['user', 'faculty','batch','semester','section']);
        return Datatables::of($student)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.student.',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
