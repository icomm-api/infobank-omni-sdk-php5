<?php
namespace Infobank\Rcs\Exceptions;

require 'vendor/autoload.php';

class InvalidFallbackTypeException extends \InvalidArgumentException{
    public function __construct($message = "", $code = 0) {
        parent::__construct($message, $code);
    }
}

?>