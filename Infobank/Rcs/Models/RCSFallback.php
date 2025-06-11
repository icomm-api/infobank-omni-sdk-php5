<?php
namespace Infobank\Rcs\Models;

require 'vendor/autoload.php';


class RCSFallback extends \Infobank\Base\Models\Fallback implements \JsonSerializable{
    
    /**
     * RCSFallback 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/rcs#fallback
     * 
     * fallback 메시지는 SMS/MMS만 가능합니다.
     * 
     * @param string $type Fallback 종류(SMS, MMS) ) \Infobank\Rcs\Models\RCSFallbackType
     * @param string $text 메시지 내용
     * @param string|null $title 메시지 제목
     * @param array $fileKey
     * @param string|null $originCID
     */
    public function __construct(
        $type,
        $text,
        $title = null,
        $fileKey = [],
        $originCID = null
    ){
        RCSFallbackType::validType($type);

        $this->type = $type;
        $this->text = $text;
        $this->title = $title;
        $this->fileKey = $fileKey;
        $this->originCID = $originCID;
    }

    public function getType(

    ){
        return $this->type;
    }

    public function setType(
        $type
    ){
        RCSFallbackType::validType($type);
        $this->type = $type;
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

    public function setTitle(
        $title
    ){
        $this->title = $title;
        return $this;
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

    public function jsonSerialize(

    ){
        $vars = get_object_vars($this);
        $filteredVars = [];

        foreach ($vars as $key => $value) {
            if ($value !== null) {
                if (is_array($value) && empty($value)) {
                    continue;
                }
                $filteredVars[$key] = $value;
            }
        }

        return $filteredVars;
    }
}


?>