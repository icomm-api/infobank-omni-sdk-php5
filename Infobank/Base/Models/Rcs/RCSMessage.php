<?php
namespace Infobank\Base\Models\Rcs;

require 'vendor/autoload.php';

use Infobank\Base\Models\Message;

abstract class RCSMessage extends Message{
    protected $content;
    protected $from;
    protected $formatId;
    protected $expiryOption;
    protected $header;
    protected $footer;
    protected $brandKey;
    protected $brandId;

    /**
     * @return RCSContent RCS Message Json Object
     */
    abstract function getContent(

    );

    /**
     * @return string 발신번호
     */
    abstract function getFrom(

    );

    /**
     * @return string RCS 메시지 formatID
     */
    abstract function getFormatId(

    );

    /**
     * @return string 전송 time out설정 (Default: 1) (1: 24시간, 2: 40초, 3: 3분 10초, 4: 1시간)
     */
    abstract function getExpiryOption(

    );

    /**
     * @param string $expiryOption 전송 time out설정 (Default: 1) (1: 24시간, 2: 40초, 3: 3분 10초, 4: 1시간)
     * @return $this
     */
    abstract function setExpiryOption(
        $expiryOption
    );

    /**
     * @param string 메시지 상단 ‘광고’ 표출 여부 (Default: 0) (0:미표출, 1:표출) 1인경우 footer 입력 필요
     */
    abstract function getHeader(

    );

    /**
     * @param string $header 메시지 상단 ‘광고’ 표출 여부 (Default: 0) (0:미표출, 1:표출) 1인경우 footer 입력 필요
     * @return $this
     */
    abstract function setHeader(
        $header
    );

    /**
     * @return string 메시지 하단 수신거부 번호
     */
    abstract function getFooter(

    );

    /**
     * @param string $footer 메시지 하단 수신거부 번호
     * @return $this
     */
    abstract function setFooter(
        $footer
    );

    /**
     * @return string RCS 브랜드 ID
     */
    abstract function getBrandId(

    );

    /**
     * @param string $brandId RCS 브랜드 ID
     * @return $this
     */
    abstract function setBrandId(
        $brandId
    );

    /**
     * @return string RCS 브랜드 키
     */
    abstract function getBrandKey();

    /**
     * @param string $brandKey RCS 브랜드 키
     * @return $this
     */
    abstract function setBrandKey($brandKey);
}
?>