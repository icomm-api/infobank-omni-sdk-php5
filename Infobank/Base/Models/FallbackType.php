<?php
namespace Infobank\Base\Models;

require 'vendor/autoload.php';

abstract class FallbackType{
    const SMS = "SMS";
    const MMS = "MMS";
    
    abstract static function validType($type);
}

?>