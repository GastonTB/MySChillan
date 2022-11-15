<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Imagenes implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {   
        $contador = 0;
        for($i=0; $i<4 ; $i++){
            if($value[$i] == null){
                $contador++;
            }else{
                $extension = substr($value[$i],-3);
                if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
                   
                }else{
                    $numero = $i+1;
                    $fail('La imagen '.$numero.' no es un archivo soportado');
                }

            }
            if($contador == 4){
                $fail('Por favor suba imagen');
            }
        }
    }
}
