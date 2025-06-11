<?php
namespace Infobank\International\Exceptions;

require 'vendor/autoload.php';

class ValidationException extends \Exception{
    public function __construct($message = "", $code = 0) {
        parent::__construct($message, $code);
    }
}

?>