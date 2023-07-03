<?php

class FormValidationException extends Exception
{
    public function __construct($errList = "", $code = 0, Throwable $previous = null)
    {
        $result = array_reduce(array_keys($errList), function ($carry, $key) use ($errList) {
            return $carry . $errList[$key] . '<br>';
        }, '');

        parent::__construct($result, $code, $previous);
    }
}