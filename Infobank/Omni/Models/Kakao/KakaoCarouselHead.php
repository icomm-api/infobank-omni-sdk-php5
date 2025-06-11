<?php
namespace Infobank\Omni\Models\Kakao;

class KakaoCarouselHead implements \JsonSerializable{
    private $header;
    private $content;
    private $imageUrl;
    private $urlMobile;
    private $urlPc;
    private $schemeAndroid;
    private $schemeIos;

    public function __construct($header, $content, $imageUrl){
        $this->header = $header;
        $this->content = $content;
        $this->imageUrl = $imageUrl;
    }
  
    public function getHeader()
    {
        return $this->header;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getUrlMobile()
    {
        return $this->urlMobile;
    }

    public function setUrlMobile($urlMobile)
    {
        $this->urlMobile = $urlMobile;
        return $this;
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

    public function getSchemeAndroid()
    {
        return $this->schemeAndroid;
    }

    public function setSchemeAndroid($schemeAndroid)
    {
        $this->schemeAndroid = $schemeAndroid;
        return $this;
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