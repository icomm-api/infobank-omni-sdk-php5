<?php
namespace Infobank\ImageUpload;

use Infobank\Base\RestClient;
use Infobank\ImageUpload\Models\ApiResponse;
use Infobank\ImageUpload\Models\ImageFile;

require 'vendor/autoload.php';

class ImageUploadApi extends RestClient{
    /**
     * @param string $apiUrl Api 도메인
     * @param string $clientId 아이디
     * @param string $clientId 비밀번호
     */
    public function __construct(
        $apiUrl,
        $clientId,
        $clientPasswd
    ){
        parent::__construct(
            $apiUrl,
            $clientId,
            $clientPasswd
        );
    }

    /**
     * @param \Infobank\ImageUpload\Models\ImageFile $imageFile 이미지 파일 정보
     * @return ApiResponse
     */
    public function registImageUpload(
        ImageFile $imageFile
    ){
        $response =  $this->sendImageUpload(
            $imageFile
        );

        return new ApiResponse(
            $this->httpCode,
            json_decode(
                $response,
                true
            )
        );
    }
}
?>