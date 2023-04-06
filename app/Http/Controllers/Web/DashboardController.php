<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $userCount = User::count();
        $onlineUserCount = User::where('is_online', true)->count();

        return view('dashboard')->with([
            'userCount' => $userCount,
            'onlineUserCount' => $onlineUserCount,
        ]);
    }
}
