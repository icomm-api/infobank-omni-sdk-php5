<?php
namespace Infobank\Omni\Models\Kakao;

class KakaoCarouselTail implements \JsonSerializable{
    private $urlPc;
    private $urlMobile;
    private $schemeIos;
    private $schemeAndroid;

    public function __construct($urlMobile){
        $this->urlMobile = $urlMobile;
    }

    public function getUrlPc()
    {
        return $this->urlPc;
    }

    public function setUrlPc($urlPc)
    {
        $this->urlPc = $urlPc;
        return $this;
    }

    public function getUrlMobile()
    {
        return $this->urlMobile;
    }

    public function getSchemeIos()
    {
        return $this->schemeIos;
    }

    public function setSchemeIos($schemeIos)
    {
        $this->schemeIos = $schemeIos;
        return $this;
    }

    public function getSchemeAndroid()
    {
        return $this->schemeAndroid;
    }

    public function setSchemeAndroid($schemeAndroid)
    {
        $this->schemeAndroid = $schemeAndroid;
        return $this;
    }
    
    public function jsonSerialize(
    
    )
    {
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