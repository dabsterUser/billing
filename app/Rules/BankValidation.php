<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BankValidation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $type = 'account';
    public function __construct($type)
    {
        //
        if(!empty($type)){
            $this->type = $type;
        }

    }

    public function passes($attribute, $value)
    {
        //
        if($this->type == 'account'){
            return preg_match('/^\d{9,18}$/',$value);
        }

        if($this->type == 'ifsc'){
            return preg_match('/^[A-Z]{4}0[A-Z0-9]{6}$/',$value);
        }
    }

    public function message()
    {
        if($this->type == 'account'){
            return "Invalid Account Number";
        }

        if($this->type == 'ifsc'){
            return "Invalid IFSC Code";
        }
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
