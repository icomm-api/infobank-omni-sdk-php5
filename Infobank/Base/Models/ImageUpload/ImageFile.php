<?php
namespace Infobank\Base\Models\ImageUpload;

require 'vendor/autoload.php';

use Infobank\Base\Models\Message;

abstract class ImageFile extends Message{
    protected $serviceType;
    protected $fileName;


    /**
     * @param string $serviceType 이미지가 사용 될 서비스 타입(MMS, RCS)
     * @return $this
     */
    abstract function setServiceType(
        $serviceType
    );

    /**
     * @return string 이미지가 사용 될 서비스 타입(MMS, RCS)
     */
    abstract function getServiceType(

    );


    /**
     * @param string $fileName 파일 명(전체 파일 path와 이름 입력)
     * @return $this
     */
    abstract function setFileName(
        $fileName
    );

    /**
     * @return string 파일 명(전체 파일 path와 이름 입력)
     */
    abstract function getFileName(

    );
}
?>