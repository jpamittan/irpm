<?php

namespace App\Http\Controllers;

use Auth, Hash;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{
    RedirectResponse,
    Request
};

class SettingsController extends Controller
{
    protected $environments = [
        'sqlsrv_el' => 'Excess Liability',
        'sqlsrv_wc' => 'Workers Compensation',
        // 'sqlsrv_dev' => 'TGL - Development',
        'sqlsrv_uat' => 'Truckers General Liability',
        // 'sqlsrv_preprod' => 'TGL - Pre Production'
    ];

    public function index(User $user): View
    {
        return view('settings.index', [
            'user' => $user,
            'environments' => $this->environments
        ]);
    }
    
    public function savePassword(User $user, Request $request): RedirectResponse
    {
        $user->password = Hash::make($request->input('password'));
        $blnSave = ($user->save()) ? 1 : 0;

        return redirect('/settings/' . $user->id . '?save=' . $blnSave);
    }

    public function saveEnvironment(User $user, Request $request): RedirectResponse
    {
        $blnSave = false;
        $user->db_connection = $request->get('db_connection');
        $blnSave = ($user->save()) ? 1 : 0;

        return redirect('/settings/' . $user->id . '?save=' . $blnSave);
    }
}
