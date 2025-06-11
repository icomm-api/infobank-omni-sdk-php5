<?php
namespace Infobank\ImageUpload\Models;

class ImageFile extends \Infobank\Base\Models\ImageUpload\ImageFile{
    /**
     * @param string $serviceType 이미지가 사용 될 서비스 타입(MMS, RCS)
     * @param string|null $msgType 상세 메시지 타입(FI, FW) *카카오 친구톡 이미지 업로드 시 필수
     */
    public function __construct(
        $serviceType
    ){
        ImageServiceType::validServiceType($serviceType);
        $this->serviceType = $serviceType;
    }

    public function setServiceType(
        $serviceType
    ){
        ImageServiceType::validServiceType($serviceType);
        $this->serviceType = $serviceType;
        return $this;
    }

    public function getServiceType(

    ){
        return $this->serviceType;
    }

    public function setFileName(
        $fileName
    ){
        $this->fileName = $fileName;
        return $this;
    }

    public function getFileName(

    ){
        return $this->fileName;
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