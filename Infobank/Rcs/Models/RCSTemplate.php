<?php
namespace Infobank\Rcs\Models;

require 'vendor/autoload.php';

use Infobank\Rcs\Exceptions\InvalidRCSException;

class RCSTemplate extends \Infobank\Base\Models\Rcs\RCSTemplate implements \JsonSerializable{

    public function add(
        $key,
        $value
    ){
        $this->{$key} = $value;
        return $this;
    }

    public function getDescription(

    ) {
        return $this->description;
    }

    public function setDescription(
        $description
    ) {
        $this->description = $description;
        return $this;
    }

    public function getSubContent(
        
    ){
        return $this->subContent;
    }

    /**
     * @param array $subContents 서브 컨텐트 정보 array(Infobank\Rcs\Models\RCSSubContent ...)
     * @return $this
     */
    public function setSubContent(
        array $subContents
    ){
        foreach ($subContents as $item) {
            if (!$item instanceof \Infobank\Base\Models\Rcs\RCSSubContent) {
                throw new InvalidRCSException('subContents array must contain instances of RCSSubContent.');
            }
        }
        $this->subContent = $subContents;
        return $this;
    }

    /**
     * @param RCSSubContent $subContent 서브 컨텐트 정보
     * @return $this
     */
    public function addSubContent(
        \Infobank\Base\Models\Rcs\RCSSubContent $subContent
    ){
        $this->subContent[] = $subContent;
        return $this;
    }

    public function jsonSerialize(
        
    ){
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