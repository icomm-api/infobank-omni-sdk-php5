<?php
namespace Infobank\Kakao\Models\AlimTalk;

use Infobank\Kakao\Exceptions\InvalidKkoException;

require 'vendor/autoload.php';


class AlimTalkMessageType extends \Infobank\Base\Models\Kakao\AlimTalk\AlimTalkMessageType{
    public static function validMsgType($msgType){
        switch($msgType){
            case AlimTalkMessageType::AI:
            case AlimTalkMessageType::AT:
                break;
            default:
                throw new InvalidKkoException($msgType . " is not supported");
        }
    }
}

?>