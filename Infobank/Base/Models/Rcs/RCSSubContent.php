<?php
namespace Infobank\Base\Models\Rcs;

require 'vendor/autoload.php';

abstract class RCSSubContent {
    protected $subTitle;
    protected $subDesc;
    protected $subMedia;
    protected $subMediaUrl;

    /**
     * @return string 서브 소제목
     */
    abstract function getSubTitle(

    );

    /**
     * @param string $subTitle 서브 소제목
     * @return $this
     */
    abstract function setSubTitle(
        $subTitle
    );

    /**
     * @return string 서브 소본문
     */
    abstract function getSubDesc(

    );

    /**
     * @param string $subDesc 서브 소본문
     * @return $this
     */
    abstract function setSubDesc(
        $subDesc
    );

    /**
     * @return string 서브 이미지 ex) mappfile://{file_id}
     */
    abstract function getSubMedia(

    );

    /**
     * @param string $subMedia 서브 이미지 ex) mappfile://{file_id}
     * @return $this
     */
    abstract function setSubMedia(
        $subMedia
    );

    /**
     * @return string 이미지(media) 클릭시 랜딩 URL
     */
    abstract function getSubMediaUrl(

    );

    /**
     * @param string $subMediaUrl 이미지(media) 클릭시 랜딩 URL
     * @return $this
     */
    abstract function setSubMediaUrl(
        $subMediaUrl
    );
}
?>