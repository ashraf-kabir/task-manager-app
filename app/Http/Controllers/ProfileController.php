<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  public function update(UpdateProfileRequest $request)
  {
    $user = auth()->user();

    $user->update([
      'name'     => $request->name,
      'password' => Hash::make($request->password)
    ]);

    session()->flash('success', 'User UPDATED successfully.');

    return redirect()->back();
  }

  public function edit()
  {
    return view('profile.edit')->with('user', auth()->user());
  }
}
