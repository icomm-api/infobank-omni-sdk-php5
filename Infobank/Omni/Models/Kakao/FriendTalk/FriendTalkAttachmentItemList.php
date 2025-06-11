<?php
namespace Infobank\Omni\Models\Kakao\FriendTalk;


class FriendTalkAttachmentItemList implements \JsonSerializable, \Infobank\Omni\Models\Kakao\Attachment\AttachmentItemList{
    private $title;
    private $description;

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