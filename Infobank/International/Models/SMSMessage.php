<?php

namespace Infobank\International\Models;

require 'vendor/autoload.php';


class SMSMessage extends \Infobank\Base\Models\Sms\SMSMessage implements \JsonSerializable{
    private $to;
    private $ref;

    /**
     * @param string $from 발신번호
     * @param string $to 수신번호
     * @param string $text 메시지 내용
     * @param string|null $ref 참조 필드
     */
    public function __construct(
        $from,
        $to,
        $text,
        $ref = null
    ){
        $this->from = $from;
        $this->text = $text;
        $this->to = $to;
        $this->ref = $ref;
    }

    public function getFrom(
        
    ){
        return $this->from;
    }

    public function getText(

    ){
        return $this->text;
    }

    /**
     * @return string 수신 번호
     */
    public function getTo(

    ){
        return $this->to;
    }
    /**
     * @return string 참조필드
     */
    public function getRef(

    ){
        return $this->ref;
    }

    /**
     * @param string $ref 참조필드
     * @return $this
     */
    public function setRef(
        $ref
    ){
        $this->ref = $ref;
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