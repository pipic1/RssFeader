<?php

class Sanitize {

    public static function sanitizeItem($var, $type) {
        $filter = false;
        switch ($type) {
            case 'email':
                $var = substr($var, 0, 254);
                $filter = FILTER_SANITIZE_EMAIL;
                break;

            case 'int':
                $filter = FILTER_SANITIZE_INT;
                break;

            case 'string':
                $filter = FILTER_SANITIZE_STRING;
                break;

            case 'url':
                $filter = FILTER_SANITIZE_URL;
                break;
        }


        return filter_var($var, $filter);
    }

    public static function sanitize_array($array) {
        foreach ($array as $key => $value) {
            if (isset($value)) {
                $tab[] = self::sanitizeItem($value, $key);
            }
        }

        return tab;
    }

}

?>