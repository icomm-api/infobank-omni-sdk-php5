<?php
namespace Infobank\Base\Models\Kakao\FriendTalk;

require 'vendor/autoload.php';

abstract class FriendTalkMessageType{
    const FT = "FT";
    const FI = "FI";
    const FW = "FW";
    const FC = "FC";
    const FA = "FA";
    const FP = "FP";
    const FM = "FM";
    const FL = "FL";

    abstract static function validMsgType($msgType);
}
?>