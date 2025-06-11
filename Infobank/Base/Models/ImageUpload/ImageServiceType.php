<?php
namespace Infobank\Base\Models\ImageUpload;

require 'vendor/autoload.php';

abstract class ImageServiceType{
    const MMS = "MMS";
    const RCS = "RCS";

    abstract static function validServiceType(
        $type
    );
}
?>