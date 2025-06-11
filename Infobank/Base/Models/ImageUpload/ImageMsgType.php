<?php
namespace Infobank\Base\Models\ImageUpload;

require 'vendor/autoload.php';

abstract class ImageMsgType{
    const FI = "FI";
    const FW = "FW";
    const FL = "FL";
    const FC = "FC";
    const FA = "FA";

    abstract static function validMsgType(
        $msgType
    );
}
?>