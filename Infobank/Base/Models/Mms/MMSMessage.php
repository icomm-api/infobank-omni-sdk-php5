<?php
namespace Infobank\Base\Models\Mms;

require 'vendor/autoload.php';

use Infobank\Base\Models\Message;

abstract class MMSMessage extends Message{
    protected $from;
    protected $text;
    protected $title;
    protected $fileKey;
    protected $originCID;


    /**
     * @return string 발신번호
     */
    abstract function getFrom(

    );

    /**
     * @return string 메시지 내용
     */
    abstract function getText(

    );

    /**
     * @return string 메시지 제목
     */
    abstract function getTitle(

    );

    /**
     * @param string $title 제목
     * @return $this
     */
    abstract function setTitle(
        $title
    );

    /**
     * @return string 최초 발신사업자 식별코드
     */
    abstract function getOriginCID(

    );

    /**
     * @param string $originCID 최초 발신사업자 식별코드
     * @return $this
     */
    abstract function setOriginCID(
        $originCID
    );

    /**
     * @return array 파일키 리스트
     */
    abstract function getFileKey(
        
    );

    /**
     * @param array $fileKey 파일키 리스트
     * @return $this
     */
    abstract function setFileKey(
        array $fileKey
    );
}
?>