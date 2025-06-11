<?php

namespace Infobank;

use Infobank\Sms\SMSApi;
use Infobank\International\InterSMSApi;
use Infobank\Mms\MMSApi;
use Infobank\Rcs\RCSApi;
use Infobank\Kakao\KakaoApi;
use Infobank\Omni\OmniApi;
use Infobank\ImageUpload\ImageUploadApi;
use Infobank\ImageUpload\Models\ImageFile;
use Infobank\MessageForm\MessageFormApi;
use Infobank\MessageForm\Models\MessageForm;
use Infobank\Report\ReportApi;

class InfobankClient{
    private $smsApi;
    private $interApi;
    private $mmsApi;
    private $rcsApi;
    private $kakaoApi;
    private $omniApi;
    private $imageUploader;
    private $messageForm;
    private $reportApi;

    /**
     * @param string $apiUrl Api 도메인
     * @param string $clientId 아이디
     * @param string $clientId 비밀번호
     */
    public function __construct(
        $apiUrl,
        $clientId,
        $clientPasswd
    ){
        $this->smsApi = new SMSApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );

        $this->interApi = new InterSMSApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );

        $this->mmsApi = new MMSApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );
        
        $this->rcsApi = new RCSApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );
        
        $this->kakaoApi = new KakaoApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );

        $this->omniApi = new OmniApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );

        $this->imageUploader = new ImageUploadApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );

        $this->messageForm = new MessageFormApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );

        $this->reportApi = new ReportApi(
            $apiUrl,
            $clientId,
            $clientPasswd
        );
    }

    /**
     * @param string $logFileFullPath 로그 파일 전체 경로
     * @param bool $debug debug 로그 생성 유무[true|false]
     */
    public function setSdkDebugLog(
        $logFileFullPath,
        $debug = true
    ){
        $this->smsApi->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->interApi->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->mmsApi->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->rcsApi->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->kakaoApi->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->omniApi->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->imageUploader->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->messageForm->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
        $this->reportApi->setSdkDebugLog(
            $logFileFullPath,
            $debug
        );
    }

    public function sendMessage(
        $message
    ){
        if ($message instanceof \Infobank\Sms\Models\SMSMessage){
            $response = $this->smsApi->sendSMS(
                $message
            );
        }else if ($message instanceof \Infobank\International\Models\SMSMessage){
            $response = $this->interApi->sendSMS(
                $message
            );
        }else if ($message instanceof \Infobank\Mms\Models\MMSMessage){
            $response = $this->mmsApi->sendMMS(
                $message
            );
        }else if ($message instanceof \Infobank\rcs\Models\RCSMessage){
            $response = $this->rcsApi->sendRCS(
                $message
            );
        }else if ($message instanceof \Infobank\Kakao\Models\AlimTalk\AlimTalkMessage){
            $response = $this->kakaoApi->sendAlimTalk(
                $message
            );
        }else if ($message instanceof \Infobank\Kakao\Models\FriendTalk\FriendTalkMessage){
            $response = $this->kakaoApi->sendFriendTalk(
                $message
            );
        }else if ($message instanceof \Infobank\Omni\Models\OmniMessage){
            $response = $this->omniApi->sendOmni(
                $message
            );
        }else{
            
        }

        return $response;
    }

    /**
     * @param \Infobank\ImageUpload\Models\ImageFile $imageFile 이미지 파일 정보
     * @return ApiResponse
     */
    public function uploadImage(
        ImageFile $imageFile
    ){
        return $this->imageUploader->registImageUpload(
            $imageFile
        );
    }

    /**
     * @param MessageForm $messageForm  메시지 폼
     * @return ApiResponse
     */
    public function registeMessageForm(
        MessageForm $messageForm
    ){
        return$this->messageForm->registeMessageForm(
            $messageForm
        );
    }
    
    /**
     * @param string $formId 폼 아이디
     * @return ApiResponse
     */
    public function getMessageForm(
        $formId
    ){
        return $this->messageForm->getMessageForm(
            $formId
        );
    }

    /**
     * @param string $formId 폼 아이디
     * @param MessageForm $messageForm 메시지 폼
     * @return ApiResponse
     */
    public function modifyMessageForm(
        $formId,
        MessageForm $messageForm
    ){
        return $this->messageForm->modifyMessageForm(
            $formId,
            $messageForm
        );
    }

    /**
     * @param string $formId 폼 아이디
     * @return ApiResponse
     */
    public function deleteMessageForm(
        $formId
    ){
        return $this->messageForm->deleteMessageForm(
            $formId
        );
    }

    public function getReports(

    ){
        return $this->reportApi->getReports(

        );
    }

    public function deleteReports(
        $reportId
    ){
        return $this->reportApi->deleteReports(
            $reportId
        );
    }
}