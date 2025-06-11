<?php
namespace Infobank\Base\Models;

require 'vendor/autoload.php';


abstract class ApiResponse implements \JsonSerializable{
    protected $httpCode;
    protected $code = null;
    protected $result = null;


    /**
     * @return string API호출 결과 코드
     */
    public function getCode(

    ) {
        return $this->code;
    }

    /**
     * @return string API호출 결과 설명
     */
    public function getResult(

    ) {
        return $this->result;
    }

    /**
     * @return string Http Status Code
     */
    public function getHttpCode(

    ){
        return $this->httpCode;
    }
}
?>