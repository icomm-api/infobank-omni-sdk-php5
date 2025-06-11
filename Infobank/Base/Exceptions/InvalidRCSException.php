<?php
namespace Infobank\Base\Exceptions;

require 'vendor/autoload.php';

abstract class InvalidRCSException extends \InvalidArgumentException{
    public function __construct($message = "", $code = 0) {
        parent::__construct($message, $code);
    }
}

?>