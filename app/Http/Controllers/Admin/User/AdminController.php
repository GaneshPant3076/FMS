<?php

namespace App\Http\Controllers\Admin\user;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    private $view = 'backend.admin.user.admin.';
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
        $roles = Role::all()->pluck('name', 'id');

        return view($this->view . 'create', compact('roles'));
    }

    public function store(Request $request)
    {

        $userData = array_merge(
            $request->input('user'),
            [
                'role_id' => RoleConstant::ADMIN_ID,
                'password' => bcrypt('password'),

            ]
        );



        // $roleData = $request->except(
        //     [
        //         'user',
        //         '_token'
        //     ]
        // );
        DB::beginTransaction();
        $user = User::create($userData);
        // $user->role()->create($roleData);
        Db::commit();

        return redirect()->route('admin.admin.index');
    }

    public function dataTable()
    {
        $user = User::query()->with(['role']);
        return Datatables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $params = [
                    'is_edit' => true,
                    'is_delete' => true,
                    'is_show' => true,
                    'route' => 'admin.admin.',
                    'row' => $row
                ];
                return view('backend.datatable.action', compact('params'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
