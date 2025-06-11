<?php
namespace Infobank\Omni\Models\Kakao\Attachment;

class AttachmentVideo implements \JsonSerializable{
    private $videoUrl;
    private $thumbnailUrl;

    public function __construct($videoUrl){
        $this->videoUrl = $videoUrl;
    }

    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    public function getThumbnailUrl()
    {
        return $this->thumbnailUrl;
    }

    public function setThumbnailUrl($thumbnailUrl)
    {
        $this->thumbnailUrl = $thumbnailUrl;
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