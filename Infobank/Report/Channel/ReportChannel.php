<?php
namespace Infobank\Report\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Channel\Channel;

class ReportChannel extends Channel{
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/report/polling";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}

?>