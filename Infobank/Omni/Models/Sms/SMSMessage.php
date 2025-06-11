<?php
namespace Infobank\Omni\Models\Sms;

require 'vendor/autoload.php';

class SMSMessage extends \Infobank\Base\Models\Sms\SMSMessage implements \JsonSerializable{
    private $ttl;
    private $originCID;

    /**
     * 통합 발송 SMS 메시지 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#sms
     * 
     * @param string $from 발신번호
     * @param string $to 수신번호
     * @param string $text 메시지 내용
     * @param string|null $ttl 메시지 유효 시간(초), Default:86400
     * @param string|null $originCID
     */
    public function __construct(
        $from,
        $text,
        $ttl = null,
        $originCID = null
    ){
        $this->from = $from;
        $this->text = $text;
        $this->ttl = $ttl;
        $this->originCID = $originCID;
    }

    public function getFrom(

    ){
        return $this->from;
    }

    
    public function getText(

    ){
        return $this->text;
    }
    
    public function getOriginCID(

    ){
        return $this->originCID;
    }

    public function setOriginCID(
        $originCID
    ){
        $this->originCID = $originCID;
        return $this;
    }

    /**
     * @return string 메시지 유효 시간(초), Default:86400
     */
    public function getTtl(

    ){
        return $this->ttl;
    }

    /**
     * @param string $ttl 메시지 유효 시간(초), Default:86400
     * @return $this
     */
    public function setTtl(
        $ttl
    ){
        $this->ttl = $ttl;
        return $this;
    }

    public function jsonSerialize()
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