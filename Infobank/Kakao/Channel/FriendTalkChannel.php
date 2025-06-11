<?php
namespace Infobank\Kakao\Channel;

require 'vendor/autoload.php';

class FriendTalkChannel  extends \Infobank\Base\Channel\Channel {
    public function __construct($apiUrl, $logFileFullPath, $debug){
        $this->apiUrl = $apiUrl . $this->API_VERSION . "/send/friendtalk";
        parent::__construct($this->apiUrl, $logFileFullPath, $debug);
    }
}
?>