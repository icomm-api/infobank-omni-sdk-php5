<?php
namespace Infobank\Base\Models\Rcs;

require 'vendor/autoload.php';

abstract class RCSStandAlone {
    protected $text;
    protected $title;
    protected $media;
    protected $mediaUrl;
    protected $button;
    protected $subContent;


    /**
     * @return string RCS 내용
     */
    abstract function getText(

    );

    /**
     * @param string $text RCS 내용
     * @return $this
     */
    abstract function setText(
        $text
    );

    /**
     * @return string RCS 제목
     */
    abstract function getTitle(
        
    );

    /**
     * @param string $title RCS 제목
     * @return $this
     */
    abstract function setTitle(
        $title
    );

    /**
     * @return string 이미지 ex) maapfile://{file_id}
     */
    abstract function getMedia(

    );

    /**
     * @param string $media 이미지 ex) maapfile://{file_id}
     * @return $this
     */
    abstract function setMedia(
        $media
    );

    /**
     * @return string 이미지(media) 클릭시 랜딩 URL
     */
    abstract function getMediaUrl(

    );

    /**
     * @param string $mediaUrl 이미지(media) 클릭시 랜딩 URL
     * @return $this
     */
    abstract function setMediaUrl(
        $mediaUrl
    );

    /**
     * @return array 버튼 정보 array(Infobank\Rcs\Models\RCSButton ...)
     */
    abstract function getButton(

    );

    abstract function setButton(
        array $button
    );

    /**
     * @return array 서브 컨텐트 정보 array(Infobank\Rcs\Models\RCSSubContent ...)
     */
    abstract function getSubContent(

    );
    
    abstract function setSubContent(
        array $subContent
    );
}


?>