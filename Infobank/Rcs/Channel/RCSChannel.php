<?php

namespace Infobank\Rcs\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Channel\Channel;

class RCSChannel extends Channel{
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/send/rcs";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}
?>