<?php

namespace App\Http\Controllers;

use App\UserPermissions;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @var UserPermissions
     */
    private $userPermissions;

    /**
     * Create a new controller instance.
     *
     * @param UserPermissions $userPermissions
     */
    public function __construct(UserPermissions $userPermissions)
    {
        $this->userPermissions = $userPermissions;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->userPermissions->getUserPermissions(Auth::id());
        return view('home', compact('permissions'));
    }
}
