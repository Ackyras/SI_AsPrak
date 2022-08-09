<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('is_active', true)->paginate();

        return view('admin.pages.dashboard.index', compact('users'));
    }
}
