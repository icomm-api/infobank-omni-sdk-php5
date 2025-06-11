<?php
namespace Infobank\Kakao\Exceptions;

class InvalidKkoException extends \InvalidArgumentException{
    public function __construct($message = "", $code = 0) {
        parent::__construct($message, $code);
    }
}
?>