<?php

namespace App\Http\Requests\Admin\Donation;

use Illuminate\Foundation\Http\FormRequest;

class DonationFormRequest extends FormRequest
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

        $ruleForDelivery = 'required|after:now';

        if($this->expiry_date){
            $ruleForDelivery .= '|before:expiry_date';
        }

        if (request()->isMethod('POST')) {
            $validationRule = [
                'name' => 'required|max:255',
                'quantity' => 'required|integer',
                'unit' => 'required|max:255',
                'address' => 'required|max:255',
                'category_id' => 'required|max:36',
                'description' => 'required',
                'remarks' => 'required',
                'expiry_date' => 'nullable|after:tomorrow',
                'delivery_type' => 'required',
                'donated_date_time' => $ruleForDelivery,
                'image.*' => 'nullable|mimes:jpg,jpeg,png',

            ];
        }
        else if (request()->isMethod('PUT')) {
            $validationRule = [
                'name' => 'required|max:255',
                'quantity' => 'required|integer',
                'unit' => 'required|max:255',
                'address' => 'required|max:255',
                'category_id' => 'required|max:36',
                'description' => 'required',
                'remarks' => 'required',
                'status' => 'required',
                'expiry_date' => 'nullable|after:tomorrow',
                'delivery_type' => 'required',
                'donated_date_time' => $ruleForDelivery,
                'image.*' => 'nullable|mimes:jpg,jpeg,png',
            ];
        }
        return $validationRule;
    }
}
