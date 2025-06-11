<?php
namespace Infobank\Omni\Models\Kakao\AlimTalk;

use Infobank\Omni\Models\Kakao\KakaoAttachment;

class AlimTalkMessage extends \Infobank\Base\Models\Kakao\AlimTalk\AlimTalkMessage implements \JsonSerializable {
    private $templateCode;
    private $title;
    private $header;
    private $link;
    private $attachment;
    private $supplement;
    private $price;
    private $currencyType;
    
    /**
     * 통합 발송 알림톡 메시지 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#alimtalk
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
        $templateCode,
        $text
    ){
        AlimTalkMessageType::validMsgType($msgType);

        $this->senderKey = $senderKey;
        $this->msgType = $msgType;
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

    /**
     * @return string 알림톡 템플릿 코드
     */
    public function getTemplateCode(

    ){
        return $this->templateCode;
    }

    /**
     * @param string $templateCode 알림톡 템플릿 코드
     * @return $this
     */
    public function setTemplateCode(
        $templateCode
    ){
        $this->templateCode = $templateCode;
        return $this;
    }

    /**
     * @return string 알림톡 제목(강조표기형 템플릿)
     */
    public function getTitle(

    ) {
        return $this->title;
    }

    /**
     * @param string $title 알림톡 제목(강조표기형 템플릿)
     * @return $this
     */
    public function setTitle(
        $title
    ) {
        $this->title = $title;
        return $this;
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
     * @return KakaoAttachment 첨부 정보
     */
    public function getAttachment(

    ) {
        return $this->attachment;
    }

    /**
     * @param KakaoAttachment $attachment 첨부 정보
     * @return $this
     */
    public function setAttachment(
        KakaoAttachment $attachment
    ) {
        $this->attachment = $attachment;
        return $this;
    }

    /**
     * @return \Infobank\Omni\Models\KkoAlimTalk\AlimTalkSupplement 부가 정보
     */
    public function getSupplement(

    ) {
        return $this->supplement;
    }

    /**
     * @param \Infobank\Omni\Models\KkoAlimTalk\AlimTalkSupplement $supplement 부가 정보
     * @return $this
     */
    public function setSupplement(
        $supplement
    ) {
        $this->supplement = $supplement;
        return $this;
    }

    /**
     * @return string 메시지 에 포함된 가격/금액/결제금액
     */
    public function getPrice(

    ) {
        return $this->price;
    }

    /**
     * @param string $price 메시지 에 포함된 가격/금액/결제금액
     * @return $this
     */
    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string 메시지에 포함된 가격/금액/결제금액의 통화 단위 (국제 통화 코드 - KRW, USD, EUR)
     */
    public function getCurrencyType(

    ) {
        return $this->currencyType;
    }

    /**
     * @param string $currencyType 메시지에 포함된 가격/금액/결제금액의 통화 단위 (국제 통화 코드 - KRW, USD, EUR)
     * @return $this
     */
    public function setCurrencyType($currencyType) {
        $this->currencyType = $currencyType;
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