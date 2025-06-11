<?php
namespace Infobank\Omni\Models\Rcs;


class RCSMessage extends \Infobank\Base\Models\Rcs\RCSMessage implements \JsonSerializable{
    private $copyAllowed;
    private $agencyId;
    private $agencyKey;
    private $ttl;

    /**
     * 통합발송 RCS 메시지 인스턴트 
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#rcs
     * 
     * @param RCSContent $content RCS Message Json Object
     * @param string $from 발신번호
     * @param string $formatId RCS 메시지 formatID
     * @param string $brandKey RCS 브랜드 키
     * @param string|null $brandId RCS 브랜드 ID
     * @param string|null $expiryOption 전송 time out설정 (Default: 1) (1: 24시간, 2: 40초, 3: 3분 10초, 4: 1시간)
     * @param string|null $copyAllowed 메시지 복사 허용 여부(Default:0) (0: 불가, 1:허용)
     * @param string|null $header 메시지 상단 ‘광고’ 표출 여부 (Default: 0) (0:미표출, 1:표출) 1인경우 footer 입력 필요
     * @param string|null $footer 메시지 하단 수신거부 번호
     * @param string|null $agencyId 대행사ID (Default: infobank)
     * @param string|null $agencyKey 대행사 키
     * @param string|null $ttl 메시지 유효 시간(초)(Default:86400)
     */
    public function __construct(
        \Infobank\Rcs\Models\RCSContent $content,
        $from,
        $formatId,
        $brandKey,
        $brandId = null,
        $expiryOption=null,
        $copyAllowed = null,
        $header=null,
        $footer=null,
        $agencyId=null,
        $agencyKey=null,
        $ttl = null
    ){
        $this->content = $content;
        $this->from = $from;
        $this->formatId = $formatId;
        $this->brandKey = $brandKey;
        $this->brandId = $brandId;
        $this->expiryOption = $expiryOption;
        $this->copyAllowed = $copyAllowed;
        $this->agencyId = $agencyId;
        $this->agencyKey = $agencyKey;
        $this->header = $header;
        $this->footer = $footer;
        $this->ttl = $ttl;
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

    public function getCopyAllowed(

    ){
        return $this->copyAllowed;
    }

    public function setCopyAllowed(
        $copyAllowed
    ){
        $this->copyAllowed = $copyAllowed;
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
     * @return string 대행사ID (Default: infobank)
     */
    public function getAgencyId(
        
    ){
        return $this->agencyId;
    }

    /**
     * @param string $agencyId 대행사ID (Default: infobank)
     * @return $this
     */
    public function setAgencyId(
        $agencyId
    ){
        $this->agencyId = $agencyId;
        return $this;
    }

    /**
     * @return string 대행사 키
     */
    public function getAgencyKey(
        
    ){
        return $this->agencyKey;
    }

    /**
     * @param string $agencyKey 대행사 키
     * @return $this
     */
    public function setAgencyKey(
        $agencyKey
    ){
        $this->agencyKey = $agencyKey;
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