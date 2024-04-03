<?php

namespace App\Http\Requests\Frontend\Request;

use Illuminate\Foundation\Http\FormRequest;

class MakeDonationFormRequest extends FormRequest
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

        return [
            'quantity' => 'required|integer',
            'address' => 'required|max:255',
            'delivery_type' => 'required',
            'description' => 'required',
            'request_id' => 'required',
            'expiry_date' => 'required|after:today',
            'donated_date_time' => $ruleForDelivery,

        ];
    }
}
