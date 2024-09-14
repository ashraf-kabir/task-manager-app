<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\UpdateProfileRequest;
use App\Profile;

class ProfileController extends Controller
{
  public function update(UpdateProfileRequest $request)
  {
    $user = auth()->user();

    $request->validate([
      'name'    => 'required',
      'phone'   => 'required',
      'address' => 'required',
      'city'    => 'required',
      'state'   => 'required',
      'zip'     => 'required',
      'country' => 'required'
    ]);

    $user->update([
      'name' => $request->name
    ]);

    $profile = Profile::where('user_id', $user->id)->first();

    if (!empty($profile)) {
      $profile->update([
        'phone'   => $request->phone,
        'address' => $request->address,
        'city'    => $request->city,
        'state'   => $request->state,
        'zip'     => $request->zip,
        'country' => $request->country
      ]);
    } else {
      Profile::create([
        'user_id' => $user->id,
        'phone'   => $request->phone,
        'address' => $request->address,
        'city'    => $request->city,
        'state'   => $request->state,
        'zip'     => $request->zip,
        'country' => $request->country
      ]);
    }

    session()->flash('success', 'Profile UPDATED successfully.');

    return redirect()->back();
  }

  public function edit()
  {
    $user = auth()->user();

    $profile = Profile::where('user_id', $user->id)->first();
    $company = Company::where('user_id', $user->id)->first();

    return view('profile.edit', compact('user', 'company', 'profile'));
  }
}
