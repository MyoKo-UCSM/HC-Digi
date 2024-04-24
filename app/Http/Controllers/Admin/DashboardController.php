<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public $page = 'dashboard';

    public function index(Request $request)
    {
        $page = $this->page;
        return view('admin.dashboard.index', compact('page'));
        // if ($request->user()->can('dashboard.listing')) {
        //     $page = $this->page;
        //     return view('admin.dashboard.index', compact('page'));
        // } else {
        //     // Handle unauthorized access here (e.g., redirect to a different page or show an error message)
        //     abort(403, 'Unauthorized access');
        // }
    }
}
