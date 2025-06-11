<?php
namespace Infobank\Omni\Models\Kakao\Attachment;


class AttachmentImage implements \JsonSerializable{
    private $imgUrl;
    private $imgLink;

    /**
     * 친구톡 이미지 정보
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/omni#image
     * 
     * @param string $imgUrl 등록한 이미지 URL
     * @param string|null $imgLink 이미지 클릭 시 이동할 URL 미 설정 시 카카오 톡 내 이미지 뷰어 사용
     *  */ 
    public function __construct(
        $imgUrl,
        $imgLink = null
    )
    {
        $this->imgUrl = $imgUrl;
        $this->imgLink = $imgLink;
        
    }

    /**
     * @return string 등록한 이미지 URL
     */
    public function getImgUrl(

    ){
        return $this->imgUrl;
    }

    /**
     * @return string 이미지 클릭 시 이동할 URL 미 설정 시 카카오 톡 내 이미지 뷰어 사용
     */
    public function getImgLink(

    ){
        return $this->imgLink;
    }

    /**
     * @param string $imgLink 이미지 클릭 시 이동할 URL 미 설정 시 카카오 톡 내 이미지 뷰어 사용
     * @return $this
     */
    public function setImgLink(
        $imgLink
    ){
        $this->imgLink = $imgLink;
        return $this;
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