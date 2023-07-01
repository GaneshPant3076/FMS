<?php

namespace App\Http\Controllers\Admin\User;

use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class TeacherController extends Controller
{
    private $view = 'backend.admin.user.teacher.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->wantsJson()) {
            return $this->datatable();
        }
        return view($this->view.'index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all()->pluck('name', 'id');

        return view($this->view.'create', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userData = array_merge(
            $request->input('user'),
            [
                'role_id' => RoleConstant::TEACHER_ID,
                'password' => bcrypt('password')
            ]
        );
        $teacherData = $request->except(
                [
                    'user',
                    '_token'
                ]
        );
        DB::beginTransaction();
        $user = User::create($userData);
        $user->teacher()->create($teacherData);
        Db::commit();

        return redirect()->route('admin.teacher.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id)->load(['user', 'faculty']);
        $faculties = Faculty::all()->pluck('name', 'id');

        return view($this->view.'edit', compact('teacher', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $userData = $request->input('user');
        $teacherData = $request->except(
            [
                'user',
                '_token'
            ]
        );
        DB::beginTransaction();
        $teacher->user()->update($userData);
        $teacher->update($teacherData);
        Db::commit();

        return redirect()->route('admin.teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::destroy($id);

        return redirect()->back();
    }

    public function dataTable() {
        $teacher = Teacher::query()->with(['user', 'faculty']);
        return Datatables::of($teacher)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="'.route("admin.teacher.edit", $row->id).'" class="edit-btn btn btn-primary btn-xs"><i class="la la-edit"></i></a>';
                $btn.= '<a href="'.route("admin.teacher.destroy", $row->id).'" class="delete-btn btn btn-danger btn-xs"><i class="la la-trash"></i></a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
