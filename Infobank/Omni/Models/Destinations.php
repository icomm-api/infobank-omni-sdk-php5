<?php
namespace Infobank\Omni\Models;

require 'vendor/autoload.php';

class Destinations extends \Infobank\Base\Models\Message implements \JsonSerializable{
    private $to;
    private $replaceWords;

    /**
     * 통합 발송 Destinations 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#destinations
     * 
     * @param string $to 수신번호
     * @param string|null $replaceWords 치환 문구(JSON)
     */
    public function __construct(
        $to,
        $replaceWords = null
    ){
        $this->to=$to;
        $this->replaceWords = $replaceWords;
    }


    /**
     * @return string $to 수신번호
     */
    public function getTo(

    ){
        return $this->to;
    }
    
    /**
     * @return string $replaceWords 환 문구(JSON)
     */
    public function getReplaceWords(

    ){
        $this->replaceWords;
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

    public function jsonDeserialize(
        $data
    ) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
?>