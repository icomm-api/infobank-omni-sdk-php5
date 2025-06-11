<?php
namespace Infobank\MessageForm\Exceptions;

class InvalidMessageFormException extends \InvalidArgumentException{
    public function __construct($message = "", $code = 0) {
        parent::__construct($message, $code);
    }
}
?>