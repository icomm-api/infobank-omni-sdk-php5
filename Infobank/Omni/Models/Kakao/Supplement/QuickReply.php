<?php
namespace Infobank\Omni\Models\Kakao\Supplement;

use Infobank\Omni\Models\Kakao\KakaoButton;

class QuickReply extends KakaoButton implements \JsonSerializable{

    /**
     * 카카오 비즈메시지 바로연결 정보
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#quickreply
     * 
     * @param string $name 버튼 명
     * 
     */
    public function __construct(
        $name
    ){
        $this->name = $name;
        
    }
}
?>