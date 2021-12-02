<?php

namespace App\Traits;

trait MobileNoValidatorTrait {

    public function mobileNoValidator(string $Number) {
        $ValidCode = ['013', '014', '015', '016', '017', '018', '019'];


        if (strlen($Number) > 11 || strlen($Number) < 11) {
            
            return false;
        }

        if (!in_array(substr($Number, 0, 3), $ValidCode)) {
            return false;
        }

        return true;
    }

}
