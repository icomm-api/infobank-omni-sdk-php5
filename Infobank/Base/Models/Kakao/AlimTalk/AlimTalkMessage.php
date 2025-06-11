<?php
namespace Infobank\Base\Models\Kakao\AlimTalk;


use Infobank\Base\Models\Message;

abstract class AlimTalkMessage extends Message{
    protected $senderKey;
    protected $msgType;
    protected $text;

    
    /**
     * @return string 카카오 비즈메시지 발신 프로필 키
     */
    abstract function getSenderKey(

    );

    /**
     * @return string 카카오 알림톡메시지타입
     */
    abstract function getMsgType(

    );

    /**
     * @return string 알림톡 내용
     */
    abstract function getText(

    );
}
?>