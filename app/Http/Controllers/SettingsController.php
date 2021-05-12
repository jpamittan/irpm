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
    protected $achEnvironments = [
        [            
            'connections' => [
                'sqlsrv_ach_uat' => 'UAT',
                'sqlsrv_ach_prd' => 'Production',
            ]
        ],
    ];

    protected $submissionEnvironments = [
        [
            'name' => 'Excess Liability',
            'connections' => [
                'sqlsrv_exl' => 'Development',
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

    public function index(User $user): View
    {
        return view('settings.index', [
            'user' => $user,
            'achEnvironments' => $this->achEnvironments,
            'submissionEnvironments' => $this->submissionEnvironments            
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
        $user->db_connection = $request->get('submission_connection');
        if ($request->get('ach_connection')) {
            $user->ach_connection = $request->get('ach_connection');
            if ($request->get('ach_connection') == 'sqlsrv_ach_uat') {
                $user->codeeast_connection = 'sqlsrv_codeeast_uat';
            } else if ($request->get('ach_connection') == 'sqlsrv_ach_prd') {
                $user->codeeast_connection = 'sqlsrv_codeeast_prd';
            }
        }
        $blnSave = ($user->save()) ? 1 : 0;

        return redirect('/settings/' . $user->id . '?save=' . $blnSave);
    }
}
