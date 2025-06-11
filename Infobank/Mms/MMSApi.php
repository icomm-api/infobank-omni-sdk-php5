<?php
namespace Infobank\Mms;

require 'vendor/autoload.php';

use Infobank\Base\RestClient;
use Infobank\Mms\Models\MMSMessage;
use Infobank\Mms\Models\ApiResponse;

class MMSApi extends RestClient{
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
     * @param \Infobank\Mms\Models\MMSMessage $message MMS 메시지
     * @return ApiResponse
     */
    public function sendMMS(
        MMSMessage $message
    ){
        $response = $this->sendMMSMessage(
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