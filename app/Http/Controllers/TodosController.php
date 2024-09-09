<?php

namespace App\Http\Controllers;

use App\Todo;

class TodosController extends Controller
{
  public function index(): \Illuminate\Contracts\View\Factory  | \Illuminate\Contracts\View\View  | \Illuminate\Contracts\Foundation\Application
  {
    $todos = Todo::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
    return view('todos.index')->with('todos', $todos);
  }

  public function show(Todo $todo): \Illuminate\Contracts\View\View  | \Illuminate\Contracts\View\Factory  | \Illuminate\Routing\Redirector  | \Illuminate\Http\RedirectResponse  | \Illuminate\Contracts\Foundation\Application
  {
    if (auth()->user()->id !== $todo->user_id) {
      return redirect('/todos');
    }
    return view('todos.show')->with('todos', $todo);
  }

  public function create(): \Illuminate\Contracts\View\Factory  | \Illuminate\Contracts\View\View  | \Illuminate\Contracts\Foundation\Application
  {
    return view('todos.create');
  }

  public function store(): \Illuminate\Routing\Redirector  | \Illuminate\Contracts\Foundation\Application  | \Illuminate\Http\RedirectResponse
  {
    $this->validate(request(), [
      'name'        => 'required|min:6|max:60',
      'description' => 'required|min:6'
    ]);

    $user_id = auth()->user()->id;

    $data = request()->all();

    $todo = new Todo();

    $todo->name        = $data['name'];
    $todo->description = $data['description'];
    $todo->completed   = FALSE;
    $todo->user_id     = $user_id;

    $todo->save();

    session()->flash('success', 'Todo CREATED successfully.');

    return redirect('/todos');
  }

  public function edit(Todo $todo): \Illuminate\Contracts\View\View  | \Illuminate\Contracts\View\Factory  | \Illuminate\Routing\Redirector  | \Illuminate\Http\RedirectResponse  | \Illuminate\Contracts\Foundation\Application
  {
    if (auth()->user()->id !== $todo->user_id) {
      return redirect('/todos');
    }
    return view('todos.edit')->with('todo', $todo);
  }

  public function update(Todo $todo): \Illuminate\Routing\Redirector  | \Illuminate\Contracts\Foundation\Application  | \Illuminate\Http\RedirectResponse
  {
    $this->validate(request(), [
      'name'        => 'required|min:6|max:60',
      'description' => 'required|min:6'
    ]);

    $data = request()->all();

    $todo->name        = $data['name'];
    $todo->description = $data['description'];
    $todo->save();

    session()->flash('success', 'Todo UPDATED successfully.');

    return redirect('/todos');
  }

  public function destroy(Todo $todo): \Illuminate\Routing\Redirector  | \Illuminate\Contracts\Foundation\Application  | \Illuminate\Http\RedirectResponse
  {
    $todo->delete();

    session()->flash('success', 'Todo TRASHED.');

    return redirect('/todos');
  }

  public function trashed(): \Illuminate\Contracts\View\Factory  | \Illuminate\Contracts\View\View  | \Illuminate\Contracts\Foundation\Application
  {
    $todos = Todo::where('user_id', auth()->user()->id)->onlyTrashed()->get();
    return view('todos.trashed')->with('todos', $todos);
  }

  public function kill($todo): \Illuminate\Http\RedirectResponse
  {
    $todo = Todo::withTrashed()->where('id', $todo)->first();

    $todo->forceDelete();

    session()->flash('success', 'Todo DELETED permanently.');

    return redirect()->back();
  }

  public function restore($todo): \Illuminate\Http\RedirectResponse
  {
    $todo = Todo::withTrashed()->where('id', $todo)->first();

    $todo->restore();

    session()->flash('success', 'Todo RESTORED permanently.');

    return redirect()->back();
  }

  public function complete(Todo $todo): \Illuminate\Routing\Redirector  | \Illuminate\Contracts\Foundation\Application  | \Illuminate\Http\RedirectResponse
  {
    $todo->completed = TRUE;

    $todo->save();

    session()->flash('success', 'Todo marked as COMPLETE.');

    return redirect('/todos');
  }

  public function incomplete(Todo $todo): \Illuminate\Routing\Redirector  | \Illuminate\Contracts\Foundation\Application  | \Illuminate\Http\RedirectResponse
  {
    $todo->completed = FALSE;

    $todo->save();

    session()->flash('success', 'Todo marked as INCOMPLETE.');

    return redirect('/todos');
  }

}
