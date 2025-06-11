<?php
namespace Infobank\Base\Models\Kakao\AlimTalk;
use Infobank\Base\Models\Message;

require 'vendor/autoload.php';

abstract class AlimTalkLink  extends Message{
    protected $urlMobile;
    protected $urlPc;
    protected $schemeAndroid;
    protected $schemeIos;

    /**
     * @return string 모바일용 URL
     */
    abstract function getUrlMobile();

    /**
     * @return string PC용 URL
     */
    abstract function getUrlPc();

    /**
     * @return string 안드로이드 스킴
     */
    abstract function getSchemeAndroid();

    /**
     * @param string $schemeAndroid 안드로이드 스킴
     */
    abstract function setSchemeAndroid($schemeAndroid);

    /**
     * @return string iOS 스킴
     */
    abstract function getSchemeIos();

    /**
     * @param string $schemeIos iOS 스킴
     */
    abstract function setSchemeIos($schemeIos);
}
?>