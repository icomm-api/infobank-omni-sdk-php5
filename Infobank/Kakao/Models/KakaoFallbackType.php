<?php
namespace Infobank\Kakao\Models;

use Infobank\Kakao\Exceptions\InvalidKkoException;

require 'vendor/autoload.php';

class KakaoFallbackType extends \Infobank\Base\Models\FallbackType{
    public static function validType($type){
        switch($type){
            case KakaoFallbackType::MMS:
            case KakaoFallbackType::SMS:
                break;
            default:
                throw new InvalidKkoException($type . " is not supported in fallback");
        }
    }
}

?>