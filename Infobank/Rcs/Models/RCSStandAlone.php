<?php
namespace Infobank\Rcs\Models;

require 'vendor/autoload.php';

use Infobank\Rcs\Exceptions\InvalidRCSException;

class RCSStandAlone extends \Infobank\Base\Models\Rcs\RCSStandAlone implements \JsonSerializable{

    public function getText(

    ){
        return $this->text;
    }

    
    public function setText(
        $text
    ){
        $this->text = $text;
        return $this;
    }

    public function getTitle(

    ){
        return $this->title;
    }

    
    public function setTitle(
        $title
    ){
        $this->title = $title;
        return $this;
    }

    public function getMedia(

    ){
        return $this->media;
    }

    
    public function setMedia(
        $media
    ){
        $this->media = $media;
        return $this;
    }

    public function getMediaUrl(

    ){
        return $this->mediaUrl;
    }

    
    public function setMediaUrl(
        $mediaUrl
    ){
        $this->mediaUrl = $mediaUrl;
        return $this;
    }

    public function getButton(

    ){
        return $this->button;
    }

    public function getSubContent(

    ){
        return $this->subContent;
    }

    /**
     * @param array $button 버튼 정보 array(Infobank\Rcs\Models\RCSButton ...)
     * @return $this
     */
    public function setButton(
        array $buttons
    ){
        foreach ($buttons as $item) {
            if (!$item instanceof RCSButton) {
                throw new InvalidRCSException('Button array must contain instances of RCSButton.');
            }
        }
        $this->button = $buttons;
        return $this;
    }

    /**
     * @param RCSButton $button 버튼 정보
     * @return $this
     */
    public function addButton(
        RCSButton $button
    ){
        $this->button[] = $button;
        return $this;
    }

    /**
     * @param array $subContents 서브 컨텐트 정보 array(Infobank\Rcs\Models\RCSSubContent ...)
     * @return $this
     */
    public function setSubContent(
        array $subContents
    ){
        foreach ($subContents as $item) {
            if (!$item instanceof RCSSubContent) {
                throw new InvalidRCSException('subContents array must contain instances of RCSSubContent.');
            }
        }
        $this->subContent = $subContents;
        return $this;
    }

    /**
     * @param RCSSubContent $subContent 서브 컨텐트 정보
     * @return $this
     */
    public function addSubContent(
        RCSSubContent $subContent
    ){
        $this->subContent[] = $subContent;
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