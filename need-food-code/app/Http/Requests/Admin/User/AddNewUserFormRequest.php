<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AddNewUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
            if(request()->isMethod('POST')){
                $validationRule = ['first_name' => 'required|max:100',
                'middle_name' => 'nullable',
                'last_name' => 'required|max:100',
                'email' => 'required|email|unique:users',
                'phone_number' => 'required|unique:users',
                'role' => 'required',
                'password' => ['required',
                    Password::min(8)
                        ->letters()
                        ->numbers()
                        ->symbols()
                        ->mixedCase()
                    , 'confirmed']];
            }else if(request()->isMethod('PUT')) {
                $validationRule= ['first_name' => 'required|max:100',
                    'middle_name' => 'nullable',
                    'last_name' => 'required|max:100',
                    'email' => 'required|email|unique:users,email,' . $this->userObj->id,
                    'phone_number' => 'required|unique:users,phone_number,' . $this->userObj->id,
                    'role' => 'required',
                    'password' => ['nullable',
                        Password::min(8)
                            ->letters()
                            ->numbers()
                            ->symbols()
                            ->mixedCase()
                        , 'confirmed']
                ];
            }
            return $validationRule;
    }
}
