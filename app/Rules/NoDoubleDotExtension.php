<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NoDoubleDotExtension implements Rule
{
    public function passes($attribute, $value)
    {
        // $filename = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME);
        // $extension = pathinfo($value->getClientOriginalName(), PATHINFO_EXTENSION);

        $filename = $value->getClientOriginalName();
        $parts = explode('.', $filename);
        return count($parts) <= 2;
      
        //return strpos($filename, '.') === strrpos($filename, '.') && $extension !== '';
    }

    public function message()
    {
        return 'The :attribute filename should not contain two dots in the extension.';
    }
}
