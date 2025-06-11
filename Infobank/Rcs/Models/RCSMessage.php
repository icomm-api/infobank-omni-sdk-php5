<?php
namespace Infobank\Rcs\Models;


require 'vendor/autoload.php';


class RCSMessage extends \Infobank\Base\Models\Rcs\RCSMessage implements \JsonSerializable{
    private $to;
    private $fallback;
    private $ref;
    
    /**
     * RCS 메시지 인스턴트 
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/rcs#request
     * 
     * @param RCSContent $content RCS Message Json Object
     * @param string $from 발신번호
     * @param string $to 수신번호
     * @param string $formatId RCS 메시지 formatID
     * @param string $brandKey RCS 브랜드 키
     * @param string|null $brandId RCS 브랜드 ID
     * @param string|null $expiryOption 전송 time out설정 (Default: 1) (1: 24시간, 2: 40초, 3: 3분 10초, 4: 1시간)
     * @param string|null $header 메시지 상단 ‘광고’ 표출 여부 (Default: 0) (0:미표출, 1:표출) 1인경우 footer 입력 필요
     * @param string|null $footer 메시지 하단 수신거부 번호
     * @param string|null $ref 참조필드
     * @param string|null $fallback 실패 시 전송될 Fallback 메시지 정보
     */
    public function __construct(
        RCSContent $content,
        $from,
        $to,
        $formatId,
        $brandKey,
        $brandId = null,
        $expiryOption=null,
        $header=null,
        $footer=null,
        $ref=null,
        $fallback = null
    ){
        $this->content = $content;
        $this->from = $from;
        $this->to = $to;
        $this->formatId = $formatId;
        $this->brandKey = $brandKey;
        $this->brandId = $brandId;
        $this->expiryOption = $expiryOption;
        $this->header = $header;
        $this->footer = $footer;
        $this->ref = $ref;
        $this->fallback = $fallback;
    }

    public function getContent(

    ){
        return $this->content;
    }

    public function getFrom(

    ){
        return $this->from;
    }


    public function getFormatId(

    ){
        return $this->formatId;
    }


    public function getExpiryOption(

    ){
        return $this->expiryOption;
    }

    public function setExpiryOption(
        $expiryOption
    ){
        $this->expiryOption = $expiryOption;
        return $this;
    }

    public function getHeader(

    ){
        return $this->header;
    }

    public function setHeader(
        $header
    ){
        $this->header = $header;
        return $this;
    }

    public function getFooter(

    ){
        return $this->footer;
    }

    public function setFooter(
        $footer
    ){
        $this->footer = $footer;
        return $this;
    }

    public function getBrandId(

    ){
        return $this->brandId;
    }

    public function setBrandId(
        $brandId
    ){
        $this->brandId = $brandId;
        return $this;
    }

    public function getBrandKey(
        
    ){
        return $this->brandKey;
    }

    public function setBrandKey(
        $brandKey
    ){
        $this->brandKey = $brandKey;
        return $this;
    }

    /**
     * @return string 수신번호
     */
    public function getTo(

    ){
        return $this->to;
    }
    
    /**
     * @return string 참조필드
     */
    public function getRef(

    ){
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
     * @return RCSFallback 실패 시 전송될 Fallback 메시지 정보
     */
    public function getFallback(

    ){
        return $this->fallback;
    }

    /**
     * @param RCSFallback $fallback 실패 시 전송될 Fallback 메시지 정보
     * @return $this
     */
    public function setFallback(
        RCSFallback $fallback
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