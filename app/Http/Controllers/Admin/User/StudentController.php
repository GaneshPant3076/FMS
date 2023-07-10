<?php

namespace App\Http\Controllers\Admin\user;

use App\Models\User;
use App\Models\Batch;
use App\Models\Faculty;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
            return $this->datatable();
        }
        return view($this->view . 'index');
    }

    public function create()
    {
        $faculties = Faculty::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year','id');
        $users = User::all()->pluck('name','id');

        return view($this->view . 'create', compact('faculties','batches','users'));
    }

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
            ]
        );
        DB::beginTransaction();
        $user = User::create($userData);
        $user->student()->create($studentData);
        Db::commit();

        return redirect()->route('admin.student.index');
    }

    public function show(string $id)
    {
        $user= User::all();
        
        return view('backend.admin.user.student.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id)->load(['user', 'faculty','batch']);
        $faculties = Faculty::all()->pluck('name', 'id');
        $batches = Batch::all()->pluck('batch_year', 'id');

        return view($this->view . 'edit', compact('student', 'faculties','batches'));
    }

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

    public function dataTable()
    {
        $student = Student::query()->with(['user', 'faculty','batch']);
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
