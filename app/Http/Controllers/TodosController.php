<?php

namespace App\Http\Controllers;

use App\Todo;

class TodosController extends Controller
{
  public function index()
  {
    $todos = Todo::where('user_id', auth()->user()->id)->orderBy('pin_to_top', 'DESC')->orderBy('created_at', 'DESC')->get();
    return view('todos.index')->with('todos', $todos);
  }

  public function show(Todo $todo)
  {
    if (auth()->user()->id !== $todo->user_id) {
      return redirect('/todos');
    }
    return view('todos.show')->with('todos', $todo);
  }

  public function create()
  {
    return view('todos.create');
  }

  public function store()
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
    $todo->pin_to_top  = $data['pin_to_top'] ?? FALSE;
    $todo->user_id     = $user_id;

    $todo->save();

    session()->flash('success', 'Todo CREATED successfully.');

    return redirect('/todos');
  }

  public function edit(Todo $todo)
  {
    if (auth()->user()->id !== $todo->user_id) {
      return redirect('/todos');
    }
    return view('todos.edit')->with('todo', $todo);
  }

  public function update(Todo $todo)
  {
    $this->validate(request(), [
      'name'        => 'required|min:6|max:60',
      'description' => 'required|min:6'
    ]);

    $data = request()->all();

    $todo->name        = $data['name'];
    $todo->description = $data['description'];
    $todo->pin_to_top  = $data['pin_to_top'] ?? FALSE;
    $todo->save();

    session()->flash('success', 'Todo UPDATED successfully.');

    return redirect('/todos');
  }

  public function destroy(Todo $todo)
  {
    $todo->delete();

    session()->flash('success', 'Todo TRASHED.');

    return redirect('/todos');
  }

  public function trashed()
  {
    $todos = Todo::where('user_id', auth()->user()->id)->onlyTrashed()->get();
    return view('todos.trashed')->with('todos', $todos);
  }

  public function kill($todo)
  {
    $todo = Todo::withTrashed()->where('id', $todo)->first();

    $todo->forceDelete();

    session()->flash('success', 'Todo DELETED permanently.');

    return redirect()->back();
  }

  public function restore($todo)
  {
    $todo = Todo::withTrashed()->where('id', $todo)->first();

    $todo->restore();

    session()->flash('success', 'Todo RESTORED permanently.');

    return redirect()->back();
  }

  public function complete(Todo $todo)
  {
    $todo->completed = TRUE;

    $todo->save();

    session()->flash('success', 'Todo marked as COMPLETE.');

    return redirect('/todos');
  }

  public function incomplete(Todo $todo)
  {
    $todo->completed = FALSE;

    $todo->save();

    session()->flash('success', 'Todo marked as INCOMPLETE.');

    return redirect('/todos');
  }

  public function pin(Todo $todo)
  {
    $todo->pin_to_top = TRUE;

    $todo->save();

    session()->flash('success', 'Todo pinned to top.');

    return redirect('/todos');
  }

  public function unpin(Todo $todo)
  {
    $todo->pin_to_top = FALSE;

    $todo->save();

    session()->flash('success', 'Todo unpinned from top.');

    return redirect('/todos');
  }

}
