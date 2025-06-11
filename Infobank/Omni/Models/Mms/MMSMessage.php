<?php
namespace Infobank\Omni\Models\Mms;

require 'vendor/autoload.php';

class MMSMessage extends \Infobank\Base\Models\Mms\MMSMessage implements \JsonSerializable{
    private $to;
    private $ttl;

    /**
     * 통합발송 MMS 메시지 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#mms
     * @param string $from 발신번호
     * @param string $text 메시지 내용
     * @param string|null $title 메시지 제목
     * @param array $fileKey 파일 키
     * @param string|null $ttl 메시지 유효 시간(초)(Default:86400)
     * @param string|null $originCID 최초 발신사업자 식별코드
     */
    public function __construct(
        $from,
        $text,
        $title = null,
        $fileKey = [],
        $ttl = null,
        $originCID = null
    ){
        $this->from = $from;
        $this->text = $text;
        $this->title = $title;
        $this->fileKey = $fileKey;
        $this->ttl = $ttl;
        $this->originCID = $originCID;
    }

    public function getFrom(

    ){
        return $this->from;
    }

    public function setFrom(
        $from
    ){
        $this->from = $from;
        return $this;
    }

    public function getText(

    ){
        return $this->text;
    }

    public function setText(
        $text
    ){
        $this->text = $text;
        return $this;
    }

    public function getTitle(

    ){
        return $this->title;
    }

    public function getFileKey(

    ){
        return $this->fileKey;
    }

    public function setFileKey(
        array $fileKey
    ){
        $this->fileKey = $fileKey;
        return $this;
    }
    
    /**
     * @param string $title 메시지 제목
     * @return $this
     */
    public function setTitle(
        $title
    ){
        $this->title = $title;
        return $this;
    }

    /**
     * @return string 최초 발신사업자 식별코드
     */
    public function getOriginCID(){
        return $this->originCID;
    }

    /**
     * @param string $originCID 최초 발신사업자 식별코드
     * @return $this
     */
    public function setOriginCID(
        $originCID
    ){
        $this->originCID = $originCID;
        return $this;
    }

    /**
     * @param string 수신 번호
     */
    public function getTo(){
        return $this->to;
    }

    /**
     * @param string $to 수신 번호
     * @return $this
     */
    public function setTo(
        $to
    ){
        $this->to = $to;
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