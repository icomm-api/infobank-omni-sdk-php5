<?php
namespace Infobank\ImageUpload\Models;

use Infobank\ImageUpload\Exceptions\InvalidImageServiceType;

class ImageServiceType extends \Infobank\Base\Models\ImageUpload\ImageServiceType{

    public static function validServiceType(
        $serviceType
    ){
        switch($serviceType){
            case ImageServiceType::MMS:
            case ImageServiceType::RCS:
                break;
            default:
                throw new InvalidImageServiceType($serviceType . "is not suppored");
        }
    }
    
}
?>