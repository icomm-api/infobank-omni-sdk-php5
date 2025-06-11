<?php
namespace Infobank\Omni\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Channel\Channel;

class OmniChannel extends Channel{
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/send/omni";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}
?>