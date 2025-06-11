<?php
namespace Infobank\Omni\Models\Kakao;

use Infobank\Omni\Exceptions\InvalidOmniException;
use Infobank\Omni\Models\Kakao\Attachment\AttachmentImage;
use Infobank\Omni\Models\Kakao\Attachment\AttachmentItem;
use Infobank\Omni\Models\Kakao\Attachment\AttachmentItemHighlight;
use Infobank\Omni\Models\Kakao\KakaoButton;

class KakaoAttachment implements \JsonSerializable{
    private $button;
    private $item;
    private $image;
    private $itemHighlight;

    /**
     * 카카오 알림톡 첨부정보
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#attachment
     * 
     */
    public function __construct(

    ){
        
    }

     /**
     * @return array 카카오 버튼 정보(최대 5개) array(\Infobank\Omni\Models\KkoFriendTalk\FriendTalkButton ...)
     */
    public function getButton(

    )
    {
        return $this->button;
    }

    /**
     * @param array $button 카카오 버튼 정보(최대 5개) array(\Infobank\Omni\Models\KkoFriendTalk\FriendTalkButton ...)
     * @return $this
     */
    public function setButton(
        array $buttons
    ){
        foreach ($buttons as $item) {
            if (!$item instanceof KakaoButton && !$item instanceof \Infobank\Kakao\Models\KakaoButton) {
                throw new InvalidOmniException('Button array must contain instances of KakaoButton.');
            }
        }
        $this->button = $buttons;
        return $this;
    }

    /**
     * @param KakaoButton $button 카카오 버튼 정보
     * @return $this
     */
    public function addButton(
        KakaoButton $button
    ){
        $this->button[] = $button;
        return $this;
    }

    /**
     * @return AttachmentItem $item 아이템 정보
     */
    public function getItem(

    ){
        return $this->item;
    }

    /**
     * @param AttachmentItem $item 아이템 정보
     * @return $this
     */
    public function setItem(
        AttachmentItem $item
    ){
        $this->item = $item;
        return $this;
    }

    /**
     * @return AttachmentImage 친구톡 이미지 정보
     */
    public function getImage(

    ){
        return $this->image;
    }

    /**
     * @param AttachmentImage $image 친구톡 이미지 정보
     * @return $this
     */
    public function setImage(
        AttachmentImage $image
    ){
        $this->image = $image;
        return $this;
    }

    public function getItemHighlight(

    ){
        return $this->itemHighlight;
    }

    /**
     * @param AttachmentItemHighlight $itemHighlight 아이템 하이라이트 정보
     * @return $this
     */
    public function setItemHighlight(
        AttachmentItemHighlight $itemHighlight
    ){
        $this->itemHighlight = $itemHighlight;
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