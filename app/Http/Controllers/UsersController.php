<?php

use App\User;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
    public function update(UpdateProfileRequest $request) {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        session()->flash('success', 'User updated successfully.');

        return redirect()->back();
    }

    public function edit() {
        return view('users.edit')->with('user', auth()->user());
    }
}
