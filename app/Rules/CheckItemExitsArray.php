<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckItemExitsArray implements Rule
{

    private $listArray = [];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($list)
    {
        $this->listArray = $list;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $check = false;
        forEach($this->listArray as $x) {
            if(in_array($value, $x)) {
                $check = true;
                break;
            };
        }
        return $check;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $result = $this->getValueListArray($this->listArray);
        $text = implode(', ', $result);
        return "Please select the correct value: ${text}";
    }

    public function getValueListArray($data) {
        $value = [];
        foreach($data as $arrayChoice) {
            array_push($value, implode(" ", $arrayChoice));
        };
        return $value;
    }
}
