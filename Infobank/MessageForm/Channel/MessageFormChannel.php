<?php
namespace Infobank\MessageForm\Channel;

use Infobank\Base\Channel\Channel;

class MessageFormChannel extends Channel{
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/form";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}
?>