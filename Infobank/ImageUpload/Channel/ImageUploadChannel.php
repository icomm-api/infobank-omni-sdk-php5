<?php
namespace Infobank\ImageUpload\Channel;

use Infobank\Base\Exceptions\HttpRequestException;
use Infobank\ImageUpload\Models\ImageFile;

require 'vendor/autoload.php';

class ImageUploadChannel extends \Infobank\Base\Channel\Channel{
    public function __construct(
        $apiUrl,
        $logFileFullPath,
        $debug
    ){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/file";
        parent::__construct($this->apiUrl,$logFileFullPath, $debug);
    }

    
}
?>