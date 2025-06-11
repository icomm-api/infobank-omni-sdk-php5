<?php
namespace Infobank\MessageForm\Models;

class ApiResponse extends \Infobank\Base\Models\ApiResponse{
    private $data;
    private $ref;


    public function __construct(
        $httpCode,
        $json
    ){
        $this->httpCode = $httpCode;
        $this->jsonDeserialize($json);
    }

    /**
     * @return ResponseData API호출 결과 데이터
     */
    public function getData(

    ){
        return new ResponseData(
            isset($this->data['formId']) ? $this->data['formId'] : "",
            isset($this->data['messageForm']) ? $this->data['messageForm'] : "",
            isset($this->data['expired']) ? $this->data['expired'] : ""
        );
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