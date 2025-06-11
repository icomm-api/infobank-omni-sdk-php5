<?php

namespace Infobank\Mms\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Channel\Channel;

class MMSChannel extends Channel{
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/send/mms";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}
?>