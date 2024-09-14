<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
  public function update(UpdateCompanyRequest $request)
  {
    $user = auth()->user();

    $company = Company::where('user_id', $user->id)->first();

    if (!empty($company)) {
      $company->update([
        'phone'   => $request->phone,
        'address' => $request->address,
        'city'    => $request->city,
        'state'   => $request->state,
        'zip'     => $request->zip,
        'country' => $request->country
      ]);
    } else {
      Company::create([
        'user_id' => $user->id,
        'phone'   => $request->phone,
        'address' => $request->address,
        'city'    => $request->city,
        'state'   => $request->state,
        'zip'     => $request->zip,
        'country' => $request->country
      ]);
    }

    session()->flash('success', 'Company UPDATED successfully.');

    return redirect()->back();
  }

  public function edit()
  {
    $user    = auth()->user();
    $company = Company::where('user_id', $user->id)->first();

    return view('company.edit', compact('user', 'company'));
  }
}
