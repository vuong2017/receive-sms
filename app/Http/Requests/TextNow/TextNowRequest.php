<?php

namespace App\Http\Requests\TextNow;

use App\Rules\CheckItemExitsArray;
use Illuminate\Foundation\Http\FormRequest;
class TextNowRequest extends FormRequest
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
        $textNowId = $this->textnow;
        $rules = [
            'login_by' => ['required','numeric',new CheckItemExitsArray(config('constants.login_by_textnow'))],
            'cookie' => 'required',
            'user_name_textnow' => "required|unique:text_nows,user_name_textnow,${textNowId}"
        ];
        if($this->phone_country_id) {
            $rules['phone_country_id'] = ['required', new CheckItemExitsArray(config('constants.phone_country_id'))];
        }
        if($this->phone_number) {
            $rules['phone_number'] = 'required|regex:/[0-9]{9}/';
        }
        return $rules;
    }
}
