<?php
namespace Infobank\Report\Models;

class ApiResponse extends \Infobank\Base\Models\ApiResponse {
    private $data;


    public function __construct(
        $httpCode,
        $json
    ){
        $this->httpCode = $httpCode;
        $this->jsonDeserialize($json);
    }

    public function getData(

    ){
         return new ResponseData(
            $this->data
        );
    }

    private function jsonDeserialize(
        $data
    ) {
        if (isset($data)){
            foreach ($data as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->{$key} = $value;
                }
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