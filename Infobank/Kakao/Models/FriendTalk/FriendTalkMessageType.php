<?php
namespace Infobank\Kakao\Models\FriendTalk;

require 'vendor/autoload.php';

use Infobank\Kakao\Exceptions\InvalidKkoException;

class FriendTalkMessageType extends \Infobank\Base\Models\Kakao\FriendTalk\FriendTalkMessageType{
    public static function validMsgType($msgType){
        switch($msgType){
            case FriendTalkMessageType::FI:
            case FriendTalkMessageType::FT:
            case FriendTalkMessageType::FW:
                break;
            default:
                throw new InvalidKkoException($msgType . " is not supported");
        }
    }
}
?>