<?php

namespace App\Http\Requests\Admin\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class DonationRequestFormRequest extends FormRequest
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
        if (request()->isMethod('POST')) {
            $validationRule = [
                'name' => 'required|max:255',
                'quantity' => 'required|integer',
                'unit' => 'required|max:255',
                'address' => 'required|max:255',
                'category_id' => 'required|max:36',
                'description' => 'required',
                'remarks' => 'required',
                'is_expiry_date_needed' => 'nullable',
            ];
        } else if (request()->isMethod('PUT')) {
            $validationRule = [
                'name' => 'required|max:255',
                'quantity' => 'required|integer',
                'unit' => 'required|max:255',
                'address' => 'required|max:255',
                'category_id' => 'required|max:36',
                'description' => 'required',
                'remarks' => 'required',
                'is_expiry_date_needed' => 'nullable',
                'status' => 'required'
            ];
        }


        if(Route::currentRouteName() == 'store-collaboration.store'){
            $validationRule['start_date'] = 'required|after:yesterday';
            $validationRule['end_date'] = 'required|after:start_date';
            $validationRule['collaborator_id'] = 'required';
        }

        return $validationRule;
    }
}
