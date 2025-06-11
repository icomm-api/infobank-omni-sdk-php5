<?php
namespace Infobank\Omni\Models\Kakao\Attachment;

class AttachmentCoupon implements \JsonSerializable{
    private $title;
    private $description;
    private $urlPc;
    private $urlMobile;
    private $schemeAndroid;
    private $schemeIos;

    public function __construct($title, $description){
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle()
    {
        return $this->title;
    }


    public function getDescription()
    {
        return $this->description;
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

    public function setUrlMobile($urlMobile)
    {
        $this->urlMobile = $urlMobile;
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