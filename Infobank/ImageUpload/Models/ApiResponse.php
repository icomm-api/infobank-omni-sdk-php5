<?php
namespace Infobank\ImageUpload\Models;

require 'vendor/autoload.php';

class ApiResponse extends \Infobank\Base\Models\ApiResponse{
    private $data;

    public function __construct(
        $httpCode,
        $json
    ){
        $this->httpCode = $httpCode;
        $this->jsonDeserialize($json);
    }

    public function getCode(

    ) {
        return $this->code;
    }

    public function getResult(

    ) {
        return $this->result;
    }
    
    /**
     * @return ResponseData API호출 결과 데이터
     */
    public function getData(

    ){
        return new ResponseData(
            isset($this->data['imgUrl']) ? $this->data['imgUrl'] : "",
            isset($this->data['fileKey']) ? $this->data['fileKey'] : "",
            isset($this->data['media']) ? $this->data['media'] : "",
            isset($this->data['expired']) ? $this->data['expired'] : ""
        );
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