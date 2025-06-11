<?php
namespace Infobank\Rcs\Models;

require 'vendor/autoload.php';

use Infobank\Rcs\Exceptions\InvalidRCSException;

class RCSContent extends \Infobank\Base\Models\Rcs\RCSContent implements \JsonSerializable{

    /**
     * RCSContent 인스턴트
     * 
     * 아래 페이지에서 상세 내용 확인이 가능합니다.
     * 
     * https://omniapi.gitbook.io/omni-api-specification/api-reference/send/rcs#content
     * 
     * 3개 필드 중 1개 필수(standalone, carousel, template)입니다.
     */
    public function __construct(

    ){
        
    }
    public function getStandalone(

    ){
        return $this->standalone;
    }

    public function getTemplate(

    ){
        return $this->template;
    }

    public function getCarousel(

    ){
        return $this->carousel;
    }

    /**
     * @param RCSStandAlone $standalone 
     * @return $this
     */
    public function setStandalone(
        RCSStandAlone $standalone
    ){
        $this->standalone = $standalone;
        return $this;
    }

    /**
     * @param  RCSTemplate $template
     * @return $this
     */
    public function setTemplate(
        RCSTemplate $template
    ){
        $this->template = $template;
        return $this;
    }
    

    public function setCarousel(
        array $carousel
    ){
        foreach ($carousel as $item) {
            if (!$item instanceof RCSCarousel) {
                throw new InvalidRCSException('carousel array must contain instances of RCSCarousel.');
            }
        }
        $this->carousel = $carousel;
        return $this;
    }

    public function jsonSerialize(){
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