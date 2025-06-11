<?php

namespace Infobank\Base;

require 'vendor/autoload.php';


use Infobank\Base\Channel\AuthChannel;
use Infobank\Base\Channel\Channel;
use Infobank\Base\Models\Message;
use Infobank\ImageUpload\Channel\ImageUploadChannel;
use Infobank\ImageUpload\Models\ImageFile;
use Infobank\Sms\Channel\SMSChannel;
use Infobank\International\Channel\InterSMSChannel;
use Infobank\Kakao\Channel\AlimTalkChannel;
use Infobank\Kakao\Channel\FriendTalkChannel;
use Infobank\MessageForm\Channel\MessageFormChannel;
use Infobank\Mms\Channel\MMSChannel;
use Infobank\Omni\Channel\OmniChannel;
use Infobank\Rcs\Channel\RCSChannel;
use Infobank\Report\Channel\ReportChannel;

class RestClient {
	private $apiUrl = null;
    private $authChannel = null;
    private $logFileFullPath = "";
    private $debug = false;
    protected $httpCode;
    
    
    public function __construct(
        $apiUrl,
        $clientId,
        $clientPasswd
    ){
        if (!filter_var($apiUrl, FILTER_VALIDATE_URL) || !preg_match("~^(?:f|ht)tps?://~i", $apiUrl)){
            throw new \InvalidArgumentException("not allowd url format");
        }

        $this->authChannel = new AuthChannel(
            $apiUrl,
            $clientId,
            $clientPasswd
        );

		$this->apiUrl = $apiUrl;        
    }

    /**
     * @param string $logFileFullPath 로그 파일 전체 경로
     * @param bool $debug debug 로그 생성 유무[true|false]
     */
    public function setSdkDebugLog(
        $logFileFullPath,
        $debug = true
    ){
        $this->logFileFullPath = $logFileFullPath;
        $this->debug = $debug;
    }

    public function requestMessage(
        Channel $channel,
        Message $message
    ){
        $tokenInfo = $this->authChannel->requestToken();

        $schema = $tokenInfo->getData()->getSchema();
        $token = $tokenInfo->getData()->getToken();
        
        $channel->addHeader("authorization", $schema . ' ' . $token);
        $channel->addHeader("Content-Type", "application/json");
            
		$response = $channel->post($message);

        $this->httpCode = $channel->getHttpCode();

        return $response;
    }

    protected function sendSMSMessage(
        Message $message
    ){
        $channel = new SMSChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );

        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function sendMMSMessage(
        Message $message
    ){
        $channel = new MMSChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );
        
        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function sendInternationalSMSMessage(
        Message $message
    ){
        $channel = new InterSMSChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );
        
        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function sendRCSMessage(
        Message $message
    ){
        $channel = new RCSChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );
        
        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function sendAlimTalkMessage(
        Message $message
    ){
        $channel = new AlimTalkChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );
        
        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function sendFriendTalkMessage(
        Message $message
    ){
        $channel = new FriendTalkChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );
        
        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function sendOmniMessage(
        Message $message
    ){
        $channel = new OmniChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );
        
        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function sendImageUpload(
        ImageFile $message
    ){
        $channel = new ImageUploadChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );

        $tokenInfo = $this->authChannel->requestToken();

        $schema = $tokenInfo->getData()->getSchema();
        $token = $tokenInfo->getData()->getToken();
        
        $channel->addHeader("authorization", $schema . ' ' . $token);
            
		$response = $channel->post_data(
            $message
        );

        $this->httpCode = $channel->getHttpCode();
        
        return $response;
    }

    protected function sendMessageForm(
        Message $message
    ){
        $channel = new MessageFormChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );
        
        return $this->requestMessage(
            $channel,
            $message
        );
    }

    protected function requestMessageForm(
        $formId
    ){
        $channel = new MessageFormChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );

        $tokenInfo = $this->authChannel->requestToken();

        $schema = $tokenInfo->getData()->getSchema();
        $token = $tokenInfo->getData()->getToken();
        
        $channel->addHeader("authorization", $schema . ' ' . $token);
            
		$response = $channel->get_message_form(
            $formId
        );

        $this->httpCode = $channel->getHttpCode();
        
        return $response;
    }

    protected function requestModifyMessageForm(
        $formId,
        Message $message
    ){
        $channel = new MessageFormChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );

        $tokenInfo = $this->authChannel->requestToken();

        $schema = $tokenInfo->getData()->getSchema();
        $token = $tokenInfo->getData()->getToken();
        
        $channel->addHeader("authorization", $schema . ' ' . $token);
            
		$response = $channel->put_message_form(
            $formId,
            $message
        );

        $this->httpCode = $channel->getHttpCode();
        
        return $response;
    }

    protected function requestDeleteMessageForm(
        $formId
    ){
        $channel = new MessageFormChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );

        $tokenInfo = $this->authChannel->requestToken();

        $schema = $tokenInfo->getData()->getSchema();
        $token = $tokenInfo->getData()->getToken();
        
        $channel->addHeader("authorization", $schema . ' ' . $token);
            
		$response = $channel->delete_message_form(
            $formId
        );

        $this->httpCode = $channel->getHttpCode();
        
        return $response;
    }

    protected function requestReports(

    ){
        $channel = new ReportChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );

        $tokenInfo = $this->authChannel->requestToken();

        $schema = $tokenInfo->getData()->getSchema();
        $token = $tokenInfo->getData()->getToken();
        
        $channel->addHeader("authorization", $schema . ' ' . $token);
            
		$response = $channel->get_reports(

        );

        $this->httpCode = $channel->getHttpCode();
        
        return $response;

        
    }

    protected function deleteReportsFromReportId(
        $reportId
    ){
        $channel = new ReportChannel(
            $this->apiUrl,
            $this->logFileFullPath,
            $this->debug
        );

        $tokenInfo = $this->authChannel->requestToken();

        $schema = $tokenInfo->getData()->getSchema();
        $token = $tokenInfo->getData()->getToken();
        
        $channel->addHeader("authorization", $schema . ' ' . $token);
            
		$response = $channel->delete_report(
            $reportId
        );

        $this->httpCode = $channel->getHttpCode();

        return $response;
    }
}

?>