<?php
namespace Infobank\Base\Models\Rcs;

require 'vendor/autoload.php';

abstract class RCSContent{
    protected $standalone;
    protected $carousel;
    protected $template;

    /**
     * @return Infobank\Rcs\Models\RCSStandAlone
     */
    abstract function getStandalone(

    );

    /**
     * @return Infobank\Rcs\Models\RCSTemplate
     */
    abstract function getTemplate(

    );

    /**
     * @return array(Infobank\Rcs\Models\RCSCarousel ...)
     */
    abstract function getCarousel(
      
    );

   /**
     * @param array $carousel array(Infobank\Rcs\Models\RCSCarousel ...)
     * @return $this
     */
    abstract function setCarousel(array $carousel);
}

?>