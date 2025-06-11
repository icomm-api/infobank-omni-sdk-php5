<?php
namespace Infobank\Rcs\Models;

require 'vendor/autoload.php';

class RCSSubContent extends \Infobank\Base\Models\Rcs\RCSSubContent implements \JsonSerializable{

    /**
     * RCSSubContent 인스텉트 
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/rcs#subcontent
     * 
     * @param string|null $subTitle 서브 소제목
     * @param string|null $subDesc 서브 소본문
     * @param string|null $subMedia 서브 이미지 ex) mappfile://{file_id}
     * @param string|null $subMediaUrl 이미지(media) 클릭시 랜딩 URL
     */
    public function __construct(
        $subTitle = null,
        $subDesc = null,
        $subMedia = null,
        $subMediaUrl = null
    ){
        $this->subTitle = $subTitle;
        $this->subDesc = $subDesc;
        $this->subMedia = $subMedia;
        $this->subMediaUrl = $subMediaUrl;
    }
    public function getSubTitle(

    ) {
        return $this->subTitle;
    }

    public function setSubTitle(
        $subTitle
    ) {
        $this->subTitle = $subTitle;
        return $this;
    }

    public function getSubDesc(

    ) {
        return $this->subDesc;
    }

    public function setSubDesc(
        $subDesc
    ) {
        $this->subDesc = $subDesc;
        return $this;
    }

    public function getSubMedia(

    ) {
        return $this->subMedia;
    }

    public function setSubMedia(
        $subMedia
    ) {
        $this->subMedia = $subMedia;
        return $this;
    }

    public function getSubMediaUrl(

    ) {
        return $this->subMediaUrl;
    }

    public function setSubMediaUrl(
        $subMediaUrl
    ) {
        $this->subMediaUrl = $subMediaUrl;
        return $this;
    }

    public function jsonSerialize(
        
    ){
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