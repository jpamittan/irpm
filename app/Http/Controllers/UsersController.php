<?php

namespace App\Http\Controllers;

use Auth, Hash;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{
    RedirectResponse,
    Request
};

class UsersController extends Controller
{
    protected $environments = [
        'sqlsrv_exl' => 'Excess Liability',
        'sqlsrv_wcm' => 'Workers Compensation',
        'sqlsrv_uat' => 'Truckers General Liability',
        // 'sqlsrv_dev' => 'TGL - Development',
        // 'sqlsrv_preprod' => 'TGL - Pre Production'
    ];

    public function index(): View
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create', [
            'environments' => $this->environments
        ]);
    }

    public function createPost(Request $request): RedirectResponse
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->is_admin = $request->input('is_admin');
        $user->db_connection = $request->input('db_connection');
        if ($user->save()) {
            return redirect('/users?created=1');
        } else {
            return redirect('/users?error=1');
        }
    }

    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'environments' => $this->environments
        ]);
    }

    public function editPost(User $user, Request $request)
    {
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->status = ($request->input('status')) ? 1 : 0;
        $user->db_connection = $request->input('db_connection');
        if ($user->save()) {
            return redirect('/users?updated=1');
        } else {
            return redirect('/users?error=1');
        }
    }

    public function delete(User $user)
    {
        if ($user->id != 1 && $user->delete()) {
            return redirect('/users?deleted=1');
        } else {
            return redirect('/users?error=1');
        }
    }

    public function savePassword(User $user, Request $request)
    {
        $user->password = Hash::make($request->input('password'));
        if ($user->save()) {
            return redirect('/users?changepassword=1');
        } else {
            return redirect('/users?error=1');
        }
    }
}
