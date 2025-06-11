<?php
namespace Infobank\Base\Models;

require 'vendor/autoload.php';

class TokenResponse extends Response {
    private $code;
    private $result;
    private $data = null;

    public function __construct(
        $json
    ){
        $this->jsonDeserialize(
            $json
        );
    }

    public function getCode(

    ) {
        return $this->code;
    }

    public function getResult(

    ) {
        return $this->result;
    }

    public function getData(

    ) {
        return $this->data;
    }

    public function setData(
        TokenData $data
    ) {
        $this->data = $data;
    }

    function jsonDeserialize(
        $data
    ) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
            if ($key == "data"){
                $this->data = new TokenData($value);
            }
            
        }
    }
}
?>