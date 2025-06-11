<?php
namespace Infobank\ImageUpload\Exceptions;

require 'vendor/autoload.php';

class InvalidImageServiceType extends \InvalidArgumentException{
    public function __construct($message = "", $code = 0) {
        parent::__construct($message, $code);
    }
}


?>