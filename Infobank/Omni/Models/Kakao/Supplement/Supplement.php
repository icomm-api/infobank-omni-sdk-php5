<?php
namespace Infobank\Omni\Models\Kakao\Supplement;

class Supplement implements \JsonSerializable{
    private $quickReply;

    /**
     * 카카오 비즈메시지 부가정보
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#supplement
     * 
     * @param array $quickReply 카카오 버튼 정보(최대 5개) array(\Infobank\Omni\Models\KkoAlimTalk\AlimTalkQuickReply ...)
     */
    public function __construct(
        array $quickReply
    ){
        $this->quickReply = $quickReply;      
    }

    /**
     * @return array 카카오 버튼 정보(최대 5개) array(\Infobank\Omni\Models\KkoAlimTalk\AlimTalkQuickReply ...)
     */
    public function getQuickReply(

    )
    {
        return $this->quickReply;
    }

    /**
     * @param \Infobank\Omni\Models\KkoAlimTalk\AlimTalkButton $button 카카오 버튼 정보
     * @return $this
     */
    public function addQuickReply(
        QuickReply $quickReply
    ){
        $this->quickReply[] = $quickReply;
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