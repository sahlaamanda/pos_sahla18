<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(SearchRequest $request)
    {
        $keyword = $request->input('search');

        $users = User::query()
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('name', 'like', "%{$keyword}%")
                      ->orWhere('email', 'like', "%{$keyword}%");
            })
            ->with('role')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // PERBAIKAN: Ubah 'admin.users.index' menjadi 'users.index'
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'owner')->get();
        
        // PERBAIKAN: Ubah 'admin.users.create' menjadi 'users.create'
        return view('users.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'  => $data['role_id'],
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil dibuat');
    }

    public function edit(User $user)
    {
        $roles = Role::where('name', '!=', 'owner')->get();
        
        // PERBAIKAN: Ubah 'admin.users.edit' menjadi 'users.edit'
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
{
    // Hapus semua produk milik user terlebih dahulu
    $user->produk()->delete();

    // Setelah produk aman, hapus user
    $user->delete();

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'User berhasil dihapus');
}
}