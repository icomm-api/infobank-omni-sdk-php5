<?php
namespace Infobank\Kakao\Models\AlimTalk;

require 'vendor/autoload.php';

class AlimTalkLink extends \Infobank\Base\Models\Kakao\AlimTalk\AlimTalkLink implements \JsonSerializable{
    
    public function __construct(
        $urlMobile,
        $urlPc
    ){
        $this->urlMobile = $urlMobile;
        $this->urlPc = $urlPc;
    }
    /**
     * @return string 모바일용 URL
     */
    public function getUrlMobile()
    {
        return $this->urlMobile;
    }

    /**
     * @return string PC용 URL
     */
    public function getUrlPc()
    {
        return $this->urlPc;
    }


    /**
     * @return string 안드로이드 스킴
     */
    public function getSchemeAndroid()
    {
        return $this->schemeAndroid;
    }

    /**
     * @param string $schemeAndroid 안드로이드 스킴
     */
    public function setSchemeAndroid($schemeAndroid)
    {
        $this->schemeAndroid = $schemeAndroid;
        return $this;
    }

    /**
     * @return string iOS 스킴
     */
    public function getSchemeIos()
    {
        return $this->schemeIos;
    }

    /**
     * @param string $schemeIos iOS 스킴
     */
    public function setSchemeIos($schemeIos)
    {
        $this->schemeIos = $schemeIos;
        return $this;
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