<?php
namespace Infobank\Omni\Models;

use Infobank\Omni\Models\Kakao\AlimTalk\AlimTalkMessage;
use Infobank\Omni\Models\Kakao\FriendTalk\FriendTalkMessage;
use Infobank\Omni\Models\Mms\MMSMessage;
use Infobank\Omni\Models\Rcs\RCSMessage;
use Infobank\Omni\Models\Sms\SMSMessage;

require 'vendor/autoload.php';

class MessageFlow extends \Infobank\Base\Models\Message implements \JsonSerializable{
    private $sms;
    private $mms;
    private $rcs;
    private $alimtalk;
    private $friendtalk;

    /**
     * 통합 발송 MessageFlow 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#messageflow
     */
    public function __construct(

    ){
        
    }

    /**
     * @return \Infobank\Omni\Models\Sms\SMSMessage $sms SMS 메시지
     */
    public function getSms(

    ){
        return $this->sms;
    }

    /**
     * @param \Infobank\Omni\Models\Sms\SMSMessage $sms SMS 메시지
     * @return $this
     */
    public function setSms(
        SMSMessage $sms
    ){
        $this->sms = $sms;
        return $this;
    }

    /**
     * @return \Infobank\Omni\Models\Mms\MMSMessage $mms SMS 메시지
     */
    public function getMms(

    ){
        return $this->mms;
    }

    /**
     * @param \Infobank\Omni\Models\Mms\MMSMessage $sms SMS 메시지
     * @return $this
     */
    public function setMms(
        MMSMessage $mms
    ){
        $this->mms = $mms;
        return $this;
    }

    /**
     * @param \Infobank\Omni\Models\Rcs\RCSMessage $rcs SMS 메시지
     * @return $this
     */
    public function setRcs(
        RCSMessage $rcs
    ){
        $this->rcs = $rcs;
        return $this;
    }

    /**
     * @return \Infobank\Omni\Models\Rcs\RCSMessage $rcs SMS 메시지
     */
    public function getRcs(

    ){
        return $this->rcs;
    }

    /**
     * @return AlimTalkMessage $alimtalk 알림톡 메시지
     */
    public function getAlimtalk(

        ){
            return $this->alimtalk;
        }

    /**
     * @param AlimTalkMessage $alimtalk 알림톡 메시지
     * @return $this
     */
    public function setAlimtalk(
        AlimTalkMessage $alimtalk
    ){
        $this->alimtalk = $alimtalk;
        return $this;
    }

    /**
     * @return FriendTalkMessage 친구톡 메시지
     */
    public function getFriendtalk(

    ){
        return $this->friendtalk;
    }

    /**
     * @param FriendTalkMessage $friendtalk 친구톡 메시지
     * @return $this
     */
    public function setFriendtalk(
        FriendTalkMessage $friendtalk
    ){
        $this->friendtalk = $friendtalk;
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