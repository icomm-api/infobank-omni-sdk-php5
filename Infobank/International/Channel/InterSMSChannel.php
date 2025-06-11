<?php

namespace Infobank\International\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Channel\Channel;

class InterSMSChannel extends Channel{
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/send/international";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}
?>