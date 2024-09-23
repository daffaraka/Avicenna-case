<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::latest()->get();
        return view('admin.users.user-index', compact('data'));
    }

    public function create()
    {
        return view('admin.users.user-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah dipakai',
            'password.required' => 'Password tidak boleh kosong',

        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        User::create($input);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user)
    {

        return view('admin.users.user-edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            // 'roles' => 'required'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email sudah dipakai',
            'password.required' => 'Password tidak boleh kosong',

        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user->update($input);


        return redirect()->route('users.index')
            ->with('success', 'User berhasil di update');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User berhasil di hapus');
    }
}
