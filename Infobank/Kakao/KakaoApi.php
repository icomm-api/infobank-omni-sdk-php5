<?php
namespace Infobank\Kakao;

use Infobank\Base\RestClient;
use Infobank\Kakao\Models\AlimTalk\AlimTalkMessage;
use Infobank\Kakao\Models\FriendTalk\FriendTalkMessage;
use Infobank\Kakao\Models\ApiResponse;

require 'vendor/autoload.php';


class KakaoApi extends RestClient{
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
     * @param AlimTalkMessage $message 알림톡 메시지
     * @return ApiResponse
     */
    public function sendAlimTalk(
        AlimTalkMessage $message
    ){
        $response = $this->sendAlimTalkMessage(
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

    /**
     * @param FriendTalkMessage $message 프랜드톡 메시지
     * @return ApiResponse
     */
    public function sendFriendTalk(
        FriendTalkMessage $message
    ){
        $response = $this->sendFriendTalkMessage(
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