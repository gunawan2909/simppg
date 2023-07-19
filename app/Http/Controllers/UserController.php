<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexRole()
    {
        $page = request(['pagination'][0] ?? 100);
        return view('User.Role', [
            'panel' => 'user',
            'user' => User::filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'pagination' => $page,
            'search' => request(['search'][0])
        ]);
    }
    public function editRole($id)
    {
        $page = request(['pagination'][0] ?? 100);
        return view('User.Role', [
            'panel' => 'user',
            'user' => User::filter(request(['search']))->orderBy('name', 'asc')->paginate($page),
            'pagination' => $page,
            'search' => request(['search'][0])
        ]);
    }
    public function updateRole($id, Request $request)
    {
        $data = $request->validate(['jabatan' => 'required']);
        User::where('id', $id)->update($data);
        return redirect(route('user.role.index'));
    }

    public function nullRole()
    {
        return view('User.Null', [
            'panel' => ""
        ]);
    }
}
