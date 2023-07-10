<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Faculty;
use App\Models\Student;

use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FacultyController extends Controller
{
    private $view = 'backend.admin.faculty.';
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'years_to_graduate'=>'required'
        ]);
        Faculty::create($data);

        return redirect()->route('faculty.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $faculty = faculty::findOrFail($id)->load(['user', 'faculty']);
        return view($this->view . 'show', compact('faculty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faculty = faculty::findOrFail($id);


        return view($this->view . 'edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faculty= 
        $faculty = Faculty::findOrFail($id);
        $faculty->update();


        return redirect()->route('faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faculty = faculty::findOrFail($id);
        DB::beginTransaction();

        $faculty->delete();
        Db::commit();
        return redirect()->route('faculty.index');
    }

    public function dataTable()
    {
        $faculty = Faculty::query();
        return Datatables::of($faculty)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'faculty.',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
