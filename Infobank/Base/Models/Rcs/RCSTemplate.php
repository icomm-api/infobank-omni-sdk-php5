<?php
namespace Infobank\Base\Models\Rcs;

require 'vendor/autoload.php';


abstract class RCSTemplate{
    protected $description;
    protected $subContent;

    /**
     * @param string|null $description 템플릿 내용
     * @param array|null $subContent 서브 컨텐트 정보 list
     */
    public function __construct(
        $description = null,
        $subContent = null
    ){
        $this->description = $description;
        $this->subContent = $subContent;
        
    }

    /**
     * @param string $key 사전에  등록된 json key
     * @param string $value 사전에 등록된 json value
     * @return $this
     */
    abstract function add(
        $key,
        $value
    );

    /**
     * @return string 템플릿 내용
     */
    abstract function getDescription(

    );

    /**
     * @param string $description 템플릿 내용
     * @return $this
     */
    abstract function setDescription(
        $description
    );

    /**
     * @return array 서브 컨텐트 정보 array(Infobank\Rcs\Models\RCSSubContent ...)
     */
    abstract function getSubContent();

    /**
     * @param array $subContent 서브 컨텐트 정보 array(Infobank\Rcs\Models\RCSSubContent ...)
     * @return $this
     */
    abstract function setSubContent(array $subContent);

}
?>