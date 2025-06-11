<?php
namespace Infobank\ImageUpload\Models;

require 'vendor/autoload.php';

class ResponseData {
    private $imgUrl;
    private $fileKey;
    private $media;
    private $expired;

    public function __construct(
        $imgUrl = null,
        $fileKey = null,
        $media = null,
        $expired = null
    ){
        $this->imgUrl = $imgUrl;
        $this->fileKey = $fileKey;
        $this->media = $media;
        $this->expired = $expired;
    }

    /**
     * @return string (카카오 친구톡)이미지 URL주소
     */
    public function getImgUrl() {
        return $this->imgUrl;
    }


    /**
     * @return string (MMS)파일키
     */
    public function getFileKey() {
        return $this->fileKey;
    }


    /**
     * @return string (RCS)maapfile 정보
     */
    public function getMedia() {
        return $this->media;
    }

    /**
     * @return string (MMS, RCS)파일키, 미디어(maapfile) 만료 일시(ISO 8601, yyyy-MM-dd'T'HH:mm:ssXXX) 
     */
    public function getExpired() {
        return $this->expired;
    }
}
?>