<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class GstinPan implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public $type = 'gstin';

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
        if($this->type == 'gstin'){
            return preg_match('/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',$value);
        }

        if($this->type == 'pan'){
            return preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $value);
        }


        if($this->type == 'both'){
            if(preg_match('/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/',$value) || preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $value) ){
                return true;
            }else{
                return false;
            }
        }



        // return pre($value) === $value;
    }


    public function message()
    {
        if($this->type == 'gstin'){
            return 'Invalid GST no.';
        }

        if($this->type == 'pan'){
            return 'Invalid PAN no.';
        }

        if($this->type == 'both'){
            return 'Invalid PAN or GSTIN no.';
        }

    }


    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
