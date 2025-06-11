<?php
namespace Infobank\Omni\Models\Kakao\Attachment;

class AttachmentItemSummary implements \JsonSerializable{
    private $title;
    private $description;

    /**
     * 아이템 요약정보
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#summary
     * 
     * @param string $title 타이틀
     * @param string $description 부가정보
     *  */ 
    public function __construct(
        $title,
        $description
    )
    {
        $this->title = $title;
        $this->description = $description;
        
    }

    /**
     * @return string 타이틀
     */
    public function getTitle(

    ){
        return $this->title;
    }

    /**
     * @return string 부가정보
     */
    public function getDescription(

    ){
        return $this->description;
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