<?php
namespace Infobank\MessageForm\Models;

use Infobank\MessageForm\Exceptions\InvalidMessageFormException;
use Infobank\Omni\Models\MessageFlow;

class MessageForm extends \Infobank\Base\Models\Message implements \JsonSerializable{
    private $messageForm;

    /**
     * 통합 발송 메시지 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/registration/form#request
     * 
     * @param array $messageForm 수신 정보 리스트(최대 10개) 
     * 
     * array(\Infobank\Omni\Models\MessageFlow ..)
     */
    public function __construct(
        array $messageForm
    ){
        foreach ($messageForm as $item) {
            if (!$item instanceof MessageFlow) {
                throw new InvalidMessageFormException('messageForm array must contain instances of MessageFlow.');
            }
        }

        $this->messageForm = $messageForm;
    }

    /**
     * 
     */
    public function getMessageForm(

    ){
        return $this->messageForm;
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