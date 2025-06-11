<?php
namespace Infobank\Base\Exceptions;

require 'vendor/autoload.php';

class AuthenticationException extends \Exception{
    public function __construct($message = "", $code = 0) {
        parent::__construct($message, $code);
    }
}
?>