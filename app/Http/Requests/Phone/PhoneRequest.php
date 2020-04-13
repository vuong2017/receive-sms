<?php

namespace App\Http\Requests\Phone;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckItemExitsArray;

class PhoneRequest extends FormRequest
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
            'textnow_id' => 'required|exists:text_nows,id',
            'phone_country_id' => ['required', new CheckItemExitsArray(config('constants.phone_country_id'))],
            'phone_number' => 'required|regex:/[0-9]{9}/',
        ];
    }
}
