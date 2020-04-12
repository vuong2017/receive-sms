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
        return [
            'login_by' => ['required','numeric',new CheckItemExitsArray(config('constants.login_by_textnow'))],
            'cookie' => 'required',
            'user_name_textnow' => "required|unique:text_nows,user_name_textnow,${textNowId}"
        ];
    }
}
