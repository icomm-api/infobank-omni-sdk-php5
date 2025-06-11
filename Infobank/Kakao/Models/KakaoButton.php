<?php
namespace Infobank\Kakao\Models;

use Infobank\Base\Models\Kakao\KakaoButtonType;

require 'vendor/autoload.php';

class KakaoButton extends \Infobank\Base\Models\Kakao\KakaoButton implements \JsonSerializable{

    /**
     * 알림톡 버튼 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/kakao#button
     * 
     * @param string $name 버튼 명
     */
    public function __construct(
        $name
    ){
        $this->name = $name;
    }

    public function makeWlButton(
        $urlMobile,
        $urlPc = null
    ){
        $this->type = KakaoButtonType::WL;
        $this->urlMobile  = $urlMobile;
        $this->urlPc = $urlPc;

        return $this;
    }

    public function makeAlButton(
        $schemeAndroid,
        $schemeIos,
        $urlMobile = null,
        $urlPc = null
    ){
        $this->type = KakaoButtonType::AL;
        $this->schemeAndroid = $schemeAndroid;
        $this->schemeIos = $schemeIos;
        $this->urlMobile = $urlMobile;
        $this->urlPc = $urlPc;

        return $this;
    }

    public function makeBkButton(
        
    ){
        $this->type = KakaoButtonType::BK;

        return $this;
    }
    
    public function makeMdButton(

    ){
        $this->type = KakaoButtonType::MD;

        return $this;
    }

    public function makeDsButton(

    ){
        $this->type = KakaoButtonType::DS;

        return $this;
    }

    public function makeBcButton(
        $chatExtra = null
    ){
        $this->type = KakaoButtonType::BC;
        $this->chatExtra = $chatExtra;

        return $this;
    }

    public function makeBtButton(
        $chatExtra = null,
        $chatEvent = null
    ){
        $this->type = KakaoButtonType::BC;
        $this->chatExtra = $chatExtra;
        $this->chatEvent = $chatEvent;

        return $this;
    }

    public function makeAcButton(

    ){
        $this->type = KakaoButtonType::AC;
        return $this;
    }

    public function makeBfButton(
        $bizFormKey = null,
        $bizFormId = null
    ){
        $this->type = KakaoButtonType::BF;
        $this->bizFormKey = $bizFormKey;
        $this->bizFormId = $bizFormId;

        return $this;
    }


    public function getType(

    ) {
        return $this->type;
    }

    public function getName(

    ) {
        return $this->name;
    }

    
    public function getUrlPc(
        
    ) {
        return $this->urlPc;
    }

    public function getUrlMobile(

    ) {
        return $this->urlMobile;
    }

    public function getSchemeIos(

    ) {
        return $this->schemeIos;
    }

    public function getSchemeAndroid(
        
    ) {
        return $this->schemeAndroid;
    }

    public function getChatExtra(

    ) {
        return $this->chatExtra;
    }

    public function getChatEvent(

    ) {
        return $this->chatEvent;
    }


    public function getBizFormKey(

    ) {
        return $this->bizFormKey;
    }

    public function getBizFormId(
        
    ) {
        return $this->bizFormId;
    }

    public function jsonSerialize(

    ){
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