<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoldingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'weight' => 'numeric',
            'year' => 'digits_between:0,'.date('Y'), 
            'weight_unit' => 'in:ounces,grams', 
            'quantity' => 'required|numeric', 
            'finess' => 'in:999,980,958,950,925,900,400', 
            'purchase_price' => 'numeric', 
            'purchase_date' => 'date', 
            'purchase_currency' => 'in:usd'
        ];
    }
}
