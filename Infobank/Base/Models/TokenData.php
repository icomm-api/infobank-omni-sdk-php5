<?php
namespace Infobank\Base\Models;

require 'vendor/autoload.php';

class TokenData {
    private $token = null;
    private $schema = null;
    private $expired = null;

    public function __construct(
        $json
    ){
        $this->jsonDeserialize($json);
    }

    public function getToken(

    ) {
        return $this->token;
    }

    public function setToken(
        $token
    ) {
        $this->token = $token;
    }

    public function getSchema(

    ) {
        return $this->schema;
    }

    public function setSchema(
        $schema
    ) {
        $this->schema = $schema;
    }

    public function getExpired(

    ) {
        return $this->expired;
    }

    public function setExpired(
        $expired
    ) {
        $this->expired = $expired;
    }

    private function jsonDeserialize(
        $data
    ) {        
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

}
?>