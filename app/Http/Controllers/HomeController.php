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
        $todos = Todo::where('user_id', auth()->user()->id)->get();
        return view('home')
                ->with('todos_count', $todos->count())
                ->with('pending_todos', $todos->where('completed', '0')->count())
                ->with('completed_todos', $todos->where('completed', '1')->count());
    }
}
