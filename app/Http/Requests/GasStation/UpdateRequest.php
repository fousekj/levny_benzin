<?php

namespace App\Http\Requests\GasStation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
//    /**
//     * Determine if the user is authorized to make this request.
//     *
//     * @return bool
//     */
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
            'priceDiesel' => ['max:5', 'between:0,99.9'],
            'priceDieselSpecial' => ['max:5', 'between:0,99.9'],
            'pricePetrol' => ['max:5', 'between:0,99.9'],
            'pricePetrolSpecial' => ['max:5', 'between:0,99.9'],
            'priceCNG' => ['max:5', 'between:0,99.9'],
            'priceLPG' => ['max:5', 'between:0,99.9'],
        ];
    }
}
