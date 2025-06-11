<?php
namespace Infobank\Sms;

require 'vendor/autoload.php';

use Infobank\Base\RestClient;
use Infobank\Sms\Models\ApiResponse;
use Infobank\Sms\Models\SMSMessage;

class SMSApi extends RestClient{
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
     * @param \Infobank\Sms\Models\SMSMessage $message SMS 메시지
     * @return ApiResponse
     */
    public function sendSMS(
        SMSMessage $message
    ){
        $response = $this->sendSMSMessage(
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