<?php
namespace Infobank\Rcs;

require 'vendor/autoload.php';

use Infobank\Base\RestClient;
use Infobank\Rcs\Models\ApiResponse;
use infobank\Rcs\Models\RCSMessage;

class RCSApi extends RestClient{
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
     * @param \Infobank\Rcs\Models\RCSMessage $message RCS 메시지
     * @return ApiResponse
     */
    public function sendRCS(
        RCSMessage $message
    ){
        $response = $this->sendRCSMessage(
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
