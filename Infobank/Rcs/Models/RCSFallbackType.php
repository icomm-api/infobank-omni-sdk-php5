<?php
namespace Infobank\Rcs\Models;

require 'vendor/autoload.php';

use Infobank\Base\Models\FallbackType;
use Infobank\Rcs\Exceptions\InvalidFallbackTypeException;


class RCSFallbackType extends FallbackType{
    public static function validType($type){
        switch($type){
            case RCSFallbackType::MMS:
            case RCSFallbackType::SMS:
                break;
            default:
                throw new InvalidFallbackTypeException($type . " is not supported in fallback");
        }
    }
}

?>