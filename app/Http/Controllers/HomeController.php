<?php

namespace App\Http\Controllers;
use App\Models\Project;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function main() {
        $totalProjects = Project::count();
        $totalCost = Project::sum('cost');
    
        return view('welcome', compact('totalProjects', 'totalCost'));
    }
}
