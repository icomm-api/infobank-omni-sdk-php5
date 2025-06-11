<?php
namespace Infobank\MessageForm\Models;


class ResponseData{
    private $formId;
    private $messageForm;
    private $expired;
    
    public function __construct(
        $formId,
        $messageForm,
        $expired
    ){
        $this->formId = $formId;
        $this->messageForm = $messageForm;
        $this->expired = $expired;
    }    

    /**
     * @return string 메시지 폼 ID
     */
    public function getFormId(

    ){
        return $this->formId;
    }

    /**
     * @return string 등록된 메시지 폼 내용
     */
    public function getMessageForm(

    ){
        return $this->messageForm;
    }

    /**
     * @return string 메시지폼  ID만료 일시(ISO 8601, yyyy-MM-dd'T'HH:mm:ssXXX)
     */
    public function getExpired(

    ){
        return $this->expired;
    }
}
?>