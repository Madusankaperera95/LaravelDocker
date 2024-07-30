<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class checkOldPassword implements ValidationRule
{
    protected $email;

    /**
     * @param $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!Hash::check($value,User::where('email',$this->email)->first()->password)){
            $fail('Old Password is Not Matching');
        }
    }

}
