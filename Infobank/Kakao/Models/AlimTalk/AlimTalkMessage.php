<?php
namespace Infobank\Kakao\Models\AlimTalk;

use Infobank\Kakao\Exceptions\InvalidKkoException;
use Infobank\Kakao\Models\KakaoButton;
use Infobank\Kakao\Models\KakaoFallback;

require 'vendor/autoload.php';

class AlimTalkMessage extends \Infobank\Base\Models\Kakao\AlimTalk\AlimTalkMessage implements \JsonSerializable {
    private $to;
    private $templateCode;
    private $title;
    private $header;
    private $link;
    private $button;
    private $ref;
    private $fallback;
    
    /**
     * 알림톡 메시지 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/kakao#request
     * 
     * @param string $senderKey 카카오 비즈메시지 발신 프로필 키
     * @param string $msgType 카카오 알림톡메시지타입
     * @param string $to 수신번호
     * @param string $templateCode 알림톡 템플릿 코드
     * @param string $text 알림톡 내용
     */
    public function __construct(
        $senderKey,
        $msgType,
        $to,
        $templateCode,
        $text
    ){
        AlimTalkMessageType::validMsgType($msgType);

        $this->senderKey = $senderKey;
        $this->msgType = $msgType;
        $this->to = $to;
        $this->templateCode = $templateCode;
        $this->text = $text;
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
     * @return string 알림톡 템플릿 코드
     */
    public function getTemplateCode(

    ){
        return $this->templateCode;
    }

    /**
     * @param string $title 알림톡 제목(강조표기형 템플릿)
     * @return $this
     */
    public function setTemplateCode(
        $templateCode
    ){
        $this->templateCode = $templateCode;
        return $this;
    }

    /**
     * @param string $title 알림톡 제목(강조표기형 템플릿)
     * @return $this
     */
    public function setTitle(
        $title
    ){
        $this->title = $title;
        return $this;
    }

    /**
     * @return string 알림톡 제목(강조표기형 템플릿)
     */
    public function getTitle(

    ){
        return $this->title;
    }

    /**
     * @param string $header 메시지 상단에 표기할 제목
     * @return $this
     */
    public function setHeader(
        $header
    ){
        $this->header = $header;
        return $this;
    }

    /**
     * @return string 메시지 상단에 표기할 제목
     */
    public function getHeader(

    ){
        return $this->header;
    }

    /**
     * @param AlimTalkLink $link 대표 링크
     * @return $this
     */
    public function setLink(
        AlimTalkLink $link
    ){
        $this->link = $link;
        return $this;
    }

    /**
     * @return AlimTalkLink 대표 링크
     */
    public function getLink(

    ){
        return $this->link;
    }


    /**
     * @return array 카카오 버튼 정보(최대 5개)
     */
    public function getButton(

    )
    {
        return $this->button;
    }

    /**
     * @param array $button 카카오 버튼 정보(최대 5개)
     * @return $this
     */
    public function setButton(
        array $buttons
    ){
        foreach ($buttons as $item) {
            if (!$item instanceof KakaoButton) {
                throw new InvalidKkoException('Button array must contain instances of KakaoButton.');
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
     * @return  $fallback 실패 시 전송될 Fallback 메시지 정보
     */
    public function getFallback(

    ){
        return $this->fallback;
    }

    /**
     * @param KakaoFallback $fallback 실패 시 전송될 Fallback 메시지 정보
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
            if ($value !== null) {
                $filteredVars[$key] = $value;
            }
        }

        return $filteredVars;
    } 
}
?>