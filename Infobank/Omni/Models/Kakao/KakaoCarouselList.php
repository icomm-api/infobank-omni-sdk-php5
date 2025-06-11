<?php
namespace Infobank\Omni\Models\Kakao;

class KakaoCarouselList implements \JsonSerializable{
    private $header;
    private $message;
    private $additionalContent;
    private $attachment;

    public function __construct(){ }

    public function getHeader()
    {
        return $this->header;
    }

    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function getAdditionalContent()
    {
        return $this->additionalContent;
    }

    public function setAdditionalContent($additionalContent)
    {
        $this->additionalContent = $additionalContent;
        return $this;
    }

    public function getAttachment()
    {
        return $this->attachment;
    }

    public function setAttachment(
        KakaoAttachment $attachment
    ){
        $this->attachment = $attachment;
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