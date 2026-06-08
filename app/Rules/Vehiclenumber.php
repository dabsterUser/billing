<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Vehiclenumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

     public function passes($attribute, $value)
     {
         //
         if(preg_match('/^[A-Za-z\s]{2}[0-9\s]{1,2}[A-Za-z\s]{1,2}[0-9\s]{1,4}$/',$value)){
             return true;
         }else{
             return false;
         }

         return ;
     }

     /**
      * Get the validation error message.
      *
      * @return string
      */
     public function message()
     {
         return 'Invalid Vehicle Number';
     }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
