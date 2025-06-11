<?php

namespace Infobank\Sms\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Channel\Channel;

class SMSChannel extends Channel{
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/send/sms";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}
?>