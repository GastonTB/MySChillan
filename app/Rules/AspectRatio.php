<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AspectRatio implements Rule
{
    protected $ratios = ['3:4', '4:3'];

    public function passes($attribute, $value)
    {
        if (! $value->isValid()) {
            return false;
        }

        [$width, $height] = getimagesize($value->getPathname());

        foreach ($this->ratios as $ratio) {
            [$w, $h] = explode(':', $ratio);

            if (($width / $height) == ($w / $h)) {
                return true;
            }
        }

        return false;
    }

    public function message()
    {
        return 'La imagen debe tener una relación de aspecto de 3:4.';
    }
}
