<?php
namespace Infobank\Omni\Models\Kakao;

use Infobank\Omni\Exceptions\InvalidOmniException;

class KakaoCarousel implements \JsonSerializable{
    private $head;
    private $list;
    private $tail;

    public function __construct(){ }

    public function getHead(){
        return $this->head;
    }

    public function setHead(KakaoCarouselHead $head){
        $this->head = $head;
    }

    public function getTail(){
        return $this->tail;
    }

    public function setTail(KakaoCarouselTail $tail){
        $this->tail = $tail;
    }

    /**
     * @param array $list 버튼 정보(Object : KakaoCarouselList)
     * @return $this
     */
    public function setList(
        array $list
    ){
        foreach ($list as $item) {
            if (!$item instanceof KakaoCarouselList) {
                throw new InvalidOmniException('list array must contain instances of AttachmentItemList.');
            }
        }   
        $this->list = $list;
    }

    public function getList(
        
    ){
        return $this->list;
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