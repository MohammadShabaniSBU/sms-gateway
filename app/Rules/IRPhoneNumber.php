<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IRPhoneNumber implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match("/^\s*((\+989)|(09))\d{9}\s*$/", $value); 
    }

    public function message()
    {
        return "your :attribute is not a valid phone number.";
    }
}
