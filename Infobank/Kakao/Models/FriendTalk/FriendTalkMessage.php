<?php

namespace Infobank\Kakao\Models\FriendTalk;

use Infobank\Kakao\Exceptions\InvalidKkoException;
use Infobank\Kakao\Models\KakaoButton;
use Infobank\Kakao\Models\KakaoFallback;

require 'vendor/autoload.php';

class FriendTalkMessage extends \Infobank\Base\Models\Kakao\FriendTalk\FriendTalkMessage implements \JsonSerializable{
    private $to;
    private $imgUrl;
    private $button;    
    private $ref;
    private $fallback;
    /**
     * 프랜드톡 메시지 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/kakao#request-1
     * 
     * @param string $senderKey 카카오 비즈메시지 발신 프로필 키
     * @param string $msgType 카카오 알림톡메시지타입
     * @param string $to 수신번호
     * @param string $text 알림톡 내용
     * @param string $imgUrl 친구톡 이미지 URL 
     */
    public function __construct(
        $senderKey,
        $msgType,
        $to,
        $text,
        $imgUrl = null
    ){
        FriendTalkMessageType::validMsgType($msgType);

        $this->senderKey = $senderKey;
        $this->msgType = $msgType;
        $this->to = $to;
        $this->text = $text;
        $this->imgUrl = $imgUrl;
    }

    
    public function getSenderKey(

    ){
        return $this->senderKey;
    }


    public function getMsgType(
        
    ){
        return $this->msgType;
    }


    public function getText(

    ){
        return $this->text;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return string 친구톡 이미지 URL
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @param string 친구톡 이미지 URL
     * @return $this
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
        return $this;
    }

    /**
     * @return array 카카오 버튼 정보(최대 5개) array(Infobank\KkoAlimTalk\Models\AlimTalkButton ...)
     */
    public function getButton(

    )
    {
        return $this->button;
    }

    /**
     * @param array $button 카카오 버튼 정보(최대 5개) array(Infobank\KkoAlimTalk\Models\AlimTalkButton ...)
     * @return $this
     */
    public function setButton(
        array $buttons
    ){
        foreach ($buttons as $item) {
            if (!$item instanceof KakaoButton) {
                throw new InvalidKkoException('Button array must contain instances of RCSButton.');
            }
        }
        $this->button = $buttons;
        return $this;
    }

    /**
     * @param KakaoButton $button 카카오 버튼 정보
     * @return $this
     */
    public function addButton(
        KakaoButton $button
    ){
        $this->button[] = $button;
        return $this;
    }

    /**
     * @return string 참조필드
     */
    public function getRef(

    )
    {
        return $this->ref;
    }

    /**
     * @param string $ref 참조필드
     * @return $this
     */
    public function setRef(
        $ref
    ){
        $this->ref = $ref;
        return $this;
    }

        /**
     * @return KakaoButton $fallback 실패 시 전송될 Fallback 메시지 정보
     */
    public function getFallback(

    ){
        return $this->fallback;
    }

    /**
     * @param KkoFallback $fallback 실패 시 전송될 Fallback 메시지 정보
     * @return $this
     */
    public function setFallback(
        KakaoFallback $fallback
    ){
        $this->fallback = $fallback;
        return $this;
    }

    public function jsonSerialize(
        
    )
    {
        $vars = get_object_vars($this);
        $filteredVars = [];

        foreach ($vars as $key => $value) {
            if (is_array($value) && empty($value)) {
                continue;
            }
            
            if ($value !== null) {
                $filteredVars[$key] = $value;
            }
        }

        return $filteredVars;
    } 
}

?>