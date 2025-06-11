<?php
namespace Infobank\Base\Models\Sms;

require 'vendor/autoload.php';

use Infobank\Base\Models\Message;

abstract class SMSMessage extends Message{
    protected $from;
    protected $text;

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

}
?>