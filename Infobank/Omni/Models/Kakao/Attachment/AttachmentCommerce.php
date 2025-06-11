<?php
namespace Infobank\Omni\Models\Kakao\Attachment;

class AttachmentCommerce implements \JsonSerializable{
    private $title;
    private $regularPrice;
    private $discountPrice;
    private $discountRate;
    private $discountFixed;

    public function __construct($title, $regularPrice){
        $this->title = $title;
        $this->regularPrice = $regularPrice;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getRegularPrice()
    {
        return $this->regularPrice;
    }

    public function getDiscountPrice()
    {
        return $this->discountPrice;
    }

    public function setDiscountPrice($discountPrice)
    {
        $this->discountPrice = $discountPrice;
        return $this;
    }

    public function getDiscountRate()
    {
        return $this->discountRate;
    }

    public function setDiscountRate($discountRate)
    {
        $this->discountRate = $discountRate;
        return $this;
    }

    public function getDiscountFixed()
    {
        return $this->discountFixed;
    }

    public function setDiscountFixed($discountFixed)
    {
        $this->discountFixed = $discountFixed;
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