<?php
namespace Infobank\Sms\Models;

require 'vendor/autoload.php';

class ApiResponse extends \Infobank\Base\Models\ApiResponse{
    private $msgKey;
    private $ref;

    public function __construct(
        $httpCode,
        $json
    ){
        $this->httpCode = $httpCode;
        $this->jsonDeserialize($json);
    }
    
    /**
     * @return string 메시지 키
     */
    public function getMsgKey(

    ){
        return $this->msgKey;
    }

    /**
     * @return string 참조필드(요청 시 입력한 데이터)
     */
    public function getRef(

    ){
        return $this->ref;
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

    public function jsonSerialize(

    )
    {
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