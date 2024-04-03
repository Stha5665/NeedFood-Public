<?php

namespace App\Http\Requests\Frontend\Request;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|max:255',
            'quantity' => 'required|integer',
            'unit' => 'required|max:255',
            'address' => 'required|max:255',
            'category_id' => 'required|max:36',
            'description' => 'required',
            'remarks' => 'required',
            'is_expiry_date_needed' => 'nullable',
        ];
    }
}
