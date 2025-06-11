<?php
namespace Infobank\Base\Models\Kakao\AlimTalk;

require 'vendor/autoload.php';

abstract class AlimTalkMessageType{
    const AT = "AT";
    const AI = "AI";

    abstract static function validMsgType($msgType);
}

?>