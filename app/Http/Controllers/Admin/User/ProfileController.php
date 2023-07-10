<?php

namespace App\Http\Controllers\Admin\user;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Constants\RoleConstant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{


    public function show()
    {
        $user = Auth::user(); // Retrieve the logged-in user
        dd($user);
        return view('index', compact('user'));
    }

}
