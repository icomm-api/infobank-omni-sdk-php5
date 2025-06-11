<?php
namespace Infobank\Omni\Models\Kakao\FriendTalk;

use Infobank\Omni\Exceptions\InvalidOmniException;
use Infobank\Omni\Models\Kakao\KakaoCarousel;
use Infobank\Omni\Models\Kakao\KakaoAttachment;

class FriendTalkMessage extends \Infobank\Base\Models\Kakao\FriendTalk\FriendTalkMessage implements \JsonSerializable{
    private $attachment;
    private $adFlag;
    private $additionalContent;
    private $adult;
    private $header;
    private $groupTagKey;
    private $pushAlarm;
    private $carousel;
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
        $msgType
    ){
        FriendTalkMessageType::validMsgType($msgType);

        $this->senderKey = $senderKey;
        $this->msgType = $msgType;
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

    public function setText(
        $text
    ){
        $this->text = $text;
    }

    /**
     * @return FriendTalkAttachment 첨부 정보
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
     * @return string 광고 거부 사용 여부(Y/N)
     */
    public function getAdFlag(

    ){
        return $this->adFlag;
    }

    /**
     * @param string $adFlag 광고 거부 사용 여부(Y/N)
     * @return $this
     */
    public function setAdFlag(
        $adFlag
    ){
        $this->adFlag = $adFlag;
        return $this;
    }
    
    /**
     * @return string 부가정보 (msgType이 FM인 경우 사용)
     */
    public function getAdditionalContent(

    ){
        return $this->additionalContent;
    }

    /**
     * @param string $additionalContent 부가정보 (msgType이 FM인 경우 사용)
     * @return $this
     */
    public function setAdditionalContent(
        $additionalContent
    ){
        $this->additionalContent = $additionalContent;
        return $this;
    }

    /**
     * @return string 성인용 메시지 여부(Y/N(기본값))
     */
    public function getAdult(

    ){
        return $this->adult;
    }

    /**
     * @param string $adult 성인용 메시지 여부(Y/N(기본값))
     * @return $this
     */
    public function setAdult(
        $adult
    ){
        $this->adult = $adult;
        return $this;
    }

    /**
     * @return string 헤더 정보 (msgType 이 FL 인  경우 필수, FP인 경우 옵션)
     */
    public function getHeader(

    ){
        return $this->header;
    }

    /**
     * @param string $header 헤더 정보 (msgType 이 FL 인  경우 필수, FP인 경우 옵션)
     * @return $this
     */
    public function setHeader(
        $header
    ){
        $this->header = $header;
        return $this;
    }

    /**
     * @return string 그룹태그 등록으로 받은 그룹태그 키
     */
    public function getGroupTagKey(

    ){
        return $this->groupTagKey;
    }

    /**
     * @param string $groupTagKey 그룹태그 등록으로 받은 그룹태그 키
     * @return $this
     */
    public function setGroupTagKey(
        $groupTagKey
    ){
        $this->groupTagKey = $groupTagKey;
        return $this;
    }

    /**
     * @return string 메시지 푸시 알람 발송 여부(Y(기본값)/N)
     */
    public function getPushAlarm(

    ){
        return $this->pushAlarm;
    }

    /**
     * @param string $pushAlarm 메시지 푸시 알람 발송 여부(Y(기본값)/N)
     * @return $this
     */
    public function setPushAlarm(
        $pushAlarm
    ){
        $this->pushAlarm = $pushAlarm;
        return $this;
    }


    public function getCarousel(

    ){
        return $this->carousel;
    }

    public function setCarousel(
        KakaoCarousel $carousel
    ){
        $this->carousel = $carousel;
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