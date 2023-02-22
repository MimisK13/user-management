<?php

namespace Mimisk13\UserManagement\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('user-management::users.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('user-management::users.create', [
           'roles' => Role::pluck('name', 'id')
        ]);
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
