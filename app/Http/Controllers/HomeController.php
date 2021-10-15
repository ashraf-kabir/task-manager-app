<?php

namespace App\Http\Controllers;
use App\Todo;
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
        return view('home')
                ->with('todos_count', Todo::all()->count())
                ->with('pending_todos', Todo::where('completed', '0')->count())
                ->with('completed_todos', Todo::where('completed', '1')->count());
    }
}
