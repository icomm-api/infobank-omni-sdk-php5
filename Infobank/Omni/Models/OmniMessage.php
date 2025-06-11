<?php
namespace Infobank\Omni\Models;

use Infobank\Omni\Exceptions\InvalidOmniException;

require 'vendor/autoload.php';

class OmniMessage extends \Infobank\Base\Models\Message implements \JsonSerializable{
    private $destinations;
    private $messageFlow;
    private $messageForm;
    private $paymentCode;
    private $ref;

    /**
     * 통합 발송 메시지 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni
     * 
     * @param array $destinations 수신 정보 리스트(최대 10개) 
     * 
     * array(\Infobank\Omni\Models\Destinations ..)
     */
    public function __construct(
        array $destinations
    ){
        foreach ($destinations as $item) {
            if (!$item instanceof Destinations) {
                throw new InvalidOmniException('destinations array must contain instances of Destinations.');
            }
        }

        $this->destinations = $destinations;
    }

    /**
     * @return array 수신 정보 리스트(최대 10개) 
     * 
     * array(\Infobank\Omni\Models\Destinations ..)
     */
    public function getDestinations(

    ){
        return $this->destinations;
    }

    /**
     * @param MessageFlow $messageFlow 메시지 정보 리스트
     */
    public function addMessageFlow(
        MessageFlow $messageFlow
    ){
        $this->messageFlow[] = $messageFlow;
        return $this;
    }

    /**
     * @return string 메시지 폼 ID
     */
    public function getMessageForm(

    ){
        return $this->messageForm;
    }

    /**
     * @param string $messageForm 메시지 폼 ID
     * @return $this
     * 
     */
    public function setMessageForm(
        $messageForm
    ){
        $this->messageForm = $messageForm;
        return $this;
    }

    /**
     * @return string 정산용 부서코드
     */
    public function getPaymentCode(

    ){
        return $this->paymentCode;
    }

    /**
     * @param string $paymentCode 정산용 부서코드
     * @return $this
     * 
     */
    public function setPaymentCode(
        $paymentCode
    ){
        $this->paymentCode = $paymentCode;
        return $this;
    }

    /**
     * @return string $ref 참조필드
     */
    public function getRef(

    ){
        return $this->ref;
    }

    /**
     * @param string $ref 참조필드
     * @return $this
     * 
     */
    public function setRef(
        $ref
    ){
        $this->ref = $ref;
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