<?php
namespace Infobank\Omni\Models;

class ResponseData {
    private $destinations;

    public function __construct(
        array $destinations
    ){
        $this->destinations = $destinations;
       
    }

    /**
     * @return array 수신 정보 별 접수 결과
     */
    public function getDestinations(

    ){
        $destinations = [];
        foreach ($this->destinations as $value) {
            foreach ($value as $data) {
                $destinations[] = new ResponseDestinations(
                    isset($data['to']) ? $data['to'] : "",
                    isset($data['msgKey']) ? $data['msgKey'] : "",
                    isset($data['code']) ? $data['code'] : "",
                    isset($data['result']) ? $data['result'] : ""
                );
            }
        }
        return $destinations;
    }
}
?>