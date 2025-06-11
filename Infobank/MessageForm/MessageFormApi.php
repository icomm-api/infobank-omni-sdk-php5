<?php
namespace Infobank\MessageForm;

use Infobank\MessageForm\Models\ApiResponse;
use Infobank\MessageForm\Models\MessageForm;

class MessageFormApi extends \Infobank\Base\RestClient{
    /**
     * @param string $apiUrl Api 도메인
     * @param string $clientId 아이디
     * @param string $clientId 비밀번호
     */
    public function __construct(
        $apiUrl,
        $clientId,
        $clientPasswd
    ){
        parent::__construct(
            $apiUrl,
            $clientId,
            $clientPasswd
        );
    }

    /**
     * @param MessageForm $messageForm  메시지 폼
     * @return ApiResponse
     */
    public function registeMessageForm(
        MessageForm $messageForm
    ){
        $response = $this->sendMessageForm(
            $messageForm
        );

        return new ApiResponse(
            $this->httpCode,
            json_decode(
                $response,
                true
            )
        );
    }
    
    /**
     * @param string $formId 폼 아이디
     * @return ApiResponse
     */
    public function getMessageForm(
        $formId
    ){
        $response = $this->requestMessageForm(
            $formId
        );

        return new ApiResponse(
            $this->httpCode,
            json_decode(
                $response,
                true
            )
        );
    }

    /**
     * @param string $formId 폼 아이디
     * @param MessageForm $messageForm 메시지 폼
     * @return ApiResponse
     */
    public function modifyMessageForm(
        $formId,
        MessageForm $messageForm
    ){
        $response = $this->requestModifyMessageForm(
            $formId,
            $messageForm
        );

        return new ApiResponse(
            $this->httpCode,
            json_decode(
                $response,
                true
            )
        );
    }

    /**
     * @param string $formId 폼 아이디
     * @return ApiResponse
     */
    public function deleteMessageForm(
        $formId
    ){
        $response = $this->requestDeleteMessageForm(
            $formId
        );

        return new ApiResponse(
            $this->httpCode,
            json_decode(
                $response,
                true
            )
        );
    }
}
?>