<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
  public function index()
  {
    return view('users.index')->with('users', User::select('id', 'name', 'email', 'is_admin', 'is_active', 'created_at')->get());
  }

  public function makeAdmin($id)
  {
    $user = User::find($id);
    if (!$user) {
      session()->flash('error', 'User not found.');
      return redirect('/users');
    }
    $user->is_admin = 1;
    $user->save();
    session()->flash('success', $user->name . ' made admin successfully.');
    return redirect('/users');
  }

  public function makeRegular($id)
  {
    $user = User::find($id);
    if (!$user) {
      session()->flash('error', 'User not found.');
      return redirect('/users');
    }
    $user->is_admin = 0;
    $user->save();
    session()->flash('success', $user->name . ' made regular successfully.');
    return redirect('/users');
  }

  public function makeActive($id)
  {
    $user = User::find($id);
    if (!$user) {
      session()->flash('error', 'User not found.');
      return redirect('/users');
    }
    $user->is_active = 1;
    $user->save();
    session()->flash('success', $user->name . ' made active successfully.');
    return redirect('/users');
  }

  public function makeInactive($id)
  {
    $user = User::find($id);
    if (!$user) {
      session()->flash('error', 'User not found.');
      return redirect('/users');
    }
    $user->is_active = 0;
    $user->save();
    session()->flash('success', $user->name . ' made inactive successfully.');
    return redirect('/users');
  }

  public function add()
  {
    return view('users.create');
  }

  public function store()
  {
    $this->validate(request(), [
      'name'     => 'required|min:6|max:60',
      'email'    => 'required|email',
      'password' => 'required|min:6'
    ]);

    $data = request()->all();

    $user = new User();

    $user->name      = $data['name'];
    $user->email     = $data['email'];
    $user->password  = bcrypt($data['password']);
    $user->is_admin  = 0;
    $user->is_active = 1;

    $user->save();

    session()->flash('success', $user->name . ' added successfully.');

    return redirect('/users');
  }

  public function edit($id)
  {
    $user = User::find($id);
    if (!$user) {
      session()->flash('error', 'User not found.');
      return redirect('/users');
    }

    return view('users.edit')->with('user', $user);
  }

  public function update($id)
  {
    $this->validate(request(), [
      'name'     => 'required|min:6|max:60',
      'password' => 'nullable|min:6'
    ]);

    $data = request()->all();

    $user = User::find($id);
    if (!$user) {
      session()->flash('error', 'User not found.');
      return redirect('/users');
    }

    $user->name     = $data['name'];

    if (!empty($data['password'])) {
      $user->password = bcrypt($data['password']);
    }

    $user->save();

    session()->flash('success', $user->name . ' UPDATED successfully.');

    return redirect('/users');
  }

  public function resetPassword(User $user)
  {
    $user->password = bcrypt('password');
    $user->save();
    session()->flash('success', 'User password reset successfully.');
    return redirect('/users');
  }
}
