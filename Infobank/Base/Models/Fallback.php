<?php
namespace Infobank\Base\Models;

require 'vendor/autoload.php';


abstract class Fallback {
    protected $type;
    protected $text;
    protected $title;
    protected $fileKey;
    protected $originCID;

    /**
     * @return string Fallback 종류(SMS, MMS)
     */
    abstract function getType(

    );

    /**
     * @param string $type Fallback 종류(SMS, MMS)
     * @return $this
     */
    abstract function setType(
        $type
    );

    /**
     * @return string Fallback 메시지 내용
     */
    abstract function getText(

    );

    /**
     * @param string $text Fallback 메시지 내용
     * @return $this
     */
    abstract function setText(
        $text
    );

    /**
     * @return string Fallback 메시지 제목
     */
    abstract function getTitle(

    );

    /**
     * @param string $title Fallback 메시지 제목
     * @return $this
     */
    abstract function setTitle(
        $title
    );

    /**
     * @return array Fallback 파일키(최대 3개) array(string ...)
     */
    abstract function getFileKey(

    );

    /**
     * @param array $fileKey Fallback 파일키(최대 3개) array(string ...)
     * @return $this
     */
    abstract function setFileKey(
        array $fileKey
    );

    /**
     * @param string $title Fallback 최초 발신사업자 식별코드
     * @return $this
     */
    abstract function getOriginCID(

    );

    /**
     * @param string $originCID Fallback 최초 발신사업자 식별코드
     * @return $this
     */
    abstract function setOriginCID(
        $originCID
    );
}
?>