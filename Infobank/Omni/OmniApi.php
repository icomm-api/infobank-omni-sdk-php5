<?php
namespace Infobank\Omni;

use Infobank\Omni\Models\OmniMessage;
use Infobank\Omni\Models\ApiResponse;

class OmniApi extends \Infobank\Base\RestClient{
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
     * @param OmniMessage $message 통합 메시지
     * @return ApiResponse
     */
    public function sendOmni(
        OmniMessage $message
    ){
        $response = $this->sendOmniMessage(
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