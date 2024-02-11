<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $datas = [
            'titlePage' => 'Data User',
            'navLink' => 'data-user',
            'dataUser' => User::all()
        ];

        return view('admin.user.index', $datas);
    }

    public function edit($id_user, User $user)
    {
        $dataUser = $user->find($id_user)->toArray();

        $datas = [
            'titlePage' => 'Data User',
            'navLink' => 'data-user',
            'id_user' => $dataUser['id'],
            'dataUser' => $dataUser
        ];

        return view('admin.user.edit', $datas);
    }

    public function update($id_user, Request $request, User $user)
    {
        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'update role user',
        ]);
    
        $validateReq = $request->validate([
            'name' => 'required',
            'role' => 'required'
        ]);
    
        $dataUser = $user->find($id_user);
        $dataUser->name = $validateReq['name'];
        $dataUser->is_admin = $validateReq['role']; 
        $dataUser->save();
    
        return redirect()->route('data-user.index')->with('success', 'Data user berhasil diubah');
    }
}
