<?php

namespace App\Http\Controllers;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {
        // return view('todos.index')->with('todos', Todo::all());
        return view('todos.index')->with('todos', Todo::orderBy('created_at', 'DESC')->get());
    }

    public function show(Todo $todo) {
        return view('todos.show')->with('todos', $todo);
    }
    
    public function create() {
        return view('todos.create');
    }

    public function store() {
        $this->validate(request(), [
            'name' => 'required|min:6|max:36',
            'description' => 'required|min:6|max:256'
        ]);

        $data = request()->all();

        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Todo created successfully.');

        return redirect('/todos');
    }

    public function edit(Todo $todo) {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo) {
        $this->validate(request(), [
            'name' => 'required|min:6|max:36',
            'description' => 'required|min:6|max:256'
        ]);

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Todo updated successfully.');

        return redirect('/todos');
    }

    public function destroy(Todo $todo) {
        $todo->delete();

        session()->flash('success', 'Todo TRASHED.');
        
        return redirect('/todos');
    }

    public function trashed() {
        $todo = Todo::onlyTrashed()->get();
        
        return view('todos.trashed')->with('todos', $todo);
    }

    public function kill($todo) {
        $todo = Todo::withTrashed()->where('id', $todo)->first();
        
        $todo->forceDelete();

        session()->flash('success', 'Todo DELETED permanently.');

        return redirect()->back();
    }

    public function restore($todo) {
        $todo = Todo::withTrashed()->where('id', $todo)->first();
        
        $todo->restore();

        session()->flash('success', 'Todo RESTORED permanently.');

        return redirect()->back();
    }

    public function complete(Todo $todo) {
        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo marked as complete.');
        
        return redirect('/todos');
    }

    public function incomplete(Todo $todo) {
        $todo->completed = false;

        $todo->save();

        session()->flash('success', 'Todo marked as incomplete.');
        
        return redirect('/todos');
    }

}
