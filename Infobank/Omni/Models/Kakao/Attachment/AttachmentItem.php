<?php
namespace Infobank\Omni\Models\Kakao\Attachment;

use Infobank\Omni\Exceptions\InvalidOmniException;

class AttachmentItem implements \JsonSerializable{
    private $list;
    private $summary;

    public function __construct(
        array $list
    ){
        foreach ($list as $item) {
            if (!$item instanceof AttachmentItemList) {
                throw new InvalidOmniException('list array must contain instances of AttachmentItemList.');
            }
        }   
        $this->list = $list;
    }

    /**
     * @param array $list 아이템 리스트(2~10 개) array(\Infobank\Omni\Models\Kakao\AttachmentItemList ...)
     * @return $this
     */
    public function getList(
        
    ){
        return $this->list;
    }

    /**
     * @return \Infobank\Omni\Models\Kakao\AttachmentItemSummary 아이템 요약정보
     */
    public function getSummary(
        
    ){
        return $this->summary;
    }

    /**
     * @param \Infobank\Omni\Models\Kakao\AttachmentItemSummary $summary 아이템 요약정보
     * @return $this
     */
    public function setSummary(
        AttachmentItemSummary $summary
    ){
        $this->summary = $summary;
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