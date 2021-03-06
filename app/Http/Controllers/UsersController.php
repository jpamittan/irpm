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
        [
            'name' => 'Excess Liability',
            'connections' => [
                'sqlsrv_exl' => 'UAT',
                'sqlsrv_exl_pre' => 'PreProd',
                'sqlsrv_exl_prd' => 'Production'
            ]
        ],
        [
            'name' => 'Workers Compensation',
            'connections' => [
                'sqlsrv_wcm' => 'UAT',
                'sqlsrv_wcm_pre' => 'PreProd',
                'sqlsrv_wcm_prd' => 'Production',
            ]
        ],
        [
            'name' => 'Truckers General Liability',
            'connections' => [
                'sqlsrv_uat' => 'UAT',
                'sqlsrv_pre' => 'PreProd',
                'sqlsrv_prd' => 'Production'
            ]
        ]
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
        $permissions = [];
        if ($request->input('permissions')) {
            foreach ($request->input('permissions') as $permission) {
                $permissions[] = $permission;
            }
        }
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
        $permissions = [];
        if ($request->input('permissions')) {
            foreach ($request->input('permissions') as $permission) {
                $permissions[] = $permission;
            }
        }
        $user->permissions = json_encode($permissions);
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
