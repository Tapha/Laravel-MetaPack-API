<?php

namespace tapha\MetaPack\Exceptions;

class MetaPackInvalidAuthException extends MetaPackErrorException
{
    public function __construct($message) {
        $this->displayErrorMessage($message);
    }

    public function displayErrorMessage($message) {
        echo $message;
    }
}
