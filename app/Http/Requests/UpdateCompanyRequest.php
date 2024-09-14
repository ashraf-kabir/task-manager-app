<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name'    => 'required|string|max:255',
      'phone'   => 'required|string|max:20',
      'address' => 'required|string|max:255',
      'city'    => 'required|string|max:100',
      'state'   => 'nullable|string|max:100',
      'zip'     => 'nullable|string|max:20',
      'country' => 'required|string|max:100'
    ];
  }

  /**
   * Get the custom error messages for validation rules.
   *
   * @return array
   */
  public function messages()
  {
    return [
      'name.required'    => 'The company name is required.',
      'phone.required'   => 'The company phone is required.',
      'address.required' => 'The company address is required.',
      'city.required'    => 'The company city is required.',
      'country.required' => 'The company country is required.'
    ];
  }
}
