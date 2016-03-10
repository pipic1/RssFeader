<?php

class validation {

    public static function validateItem($var, $type) {
        $filter = false;
        switch ($type) {
            case 'email':
                $var = substr($var, 0, 254);
                $filter = FILTER_VALIDATE_EMAIL;
                break;

            case 'int':
                $filter = FILTER_VALIDATE_INT;
                break;

            case 'boolean':
                $filter = FILTER_VALIDATE_BOOLEAN;
                break;

            case 'ip':
                $filter = FILTER_VALIDATE_IP;
                break;

            case 'url':
                $filter = FILTER_VALIDATE_URL;
                break;
        }


        return filter_var($var, $filter) == FALSE ? FALSE : TRUE;
    }

    public static function validate_array($array) {
        foreach ($array as $key => $value) {
            if (isset($value)) {
                $tab[] = self::validateItem($value, $key);
            }
        }

        return tab;
    }

}

?>