<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
  public function edit()
  {
    return view('password.edit');
  }

  public function update(Request $request)
  {
    $request->validate([
      'current_password' => 'required',
      'password'         => 'required|confirmed'
    ]);

    $user = auth()->user();

    if (!\Hash::check($request->current_password, $user->password)) {
      session()->flash('error', 'Current password does not match.');

      return redirect()->back();
    }

    $user->update([
      'password' => bcrypt($request->password)
    ]);

    session()->flash('success', 'Password UPDATED successfully.');

    return redirect()->back();
  }
}
