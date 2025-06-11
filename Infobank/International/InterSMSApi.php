<?php
namespace Infobank\International;

require 'vendor/autoload.php';

use Infobank\Base\RestClient;
use Infobank\International\Models\ApiResponse;
use Infobank\International\Models\SMSMessage;

class InterSMSApi extends RestClient{
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
     * @param \Infobank\International\Models\SMSMessage $message RCS 메시지
     * @return ApiResponse
     */
    public function sendSMS(
        SMSMessage $message
    ){
        $response = $this->sendInternationalSMSMessage(
            $message
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