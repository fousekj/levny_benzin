<?php

namespace App\Http\Requests\GasStation;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'street' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'priceDiesel' => ['max:5', 'between:0,99.99'],
            'priceDieselSpecial' => ['max:5', 'between:0,99.99'],
            'pricePetrol' => ['max:5', 'between:0,99.99'],
            'pricePetrolSpecial' => ['max:5', 'between:0,99.99'],
            'priceCNG' => ['max:5', 'between:0,99.99'],
            'priceLPG' => ['max:5', 'between:0,99.99'],
        ];
    }
}
