<?php
namespace Infobank\Omni\Models\Kakao\FriendTalk;

use Infobank\Omni\Exceptions\InvalidOmniException;

class FriendTalkMessageType extends \Infobank\Base\Models\Kakao\FriendTalk\FriendTalkMessageType{
    public static function validMsgType($msgType){
        switch($msgType){
            case FriendTalkMessageType::FI:
            case FriendTalkMessageType::FT:
            case FriendTalkMessageType::FW:
            case FriendTalkMessageType::FC:
            case FriendTalkMessageType::FA:
            case FriendTalkMessageType::FP:
            case FriendTalkMessageType::FM:
            case FriendTalkMessageType::FL:
                break;
            default:
                throw new InvalidOmniException($msgType . " is not supported");
        }
    }
}
?>