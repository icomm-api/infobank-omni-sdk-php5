<?php
namespace Infobank\Base\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Models\Message;
use Infobank\Base\Exceptions\HttpRequestException;
use Infobank\Base\Logger\LoggerTrait;
use Infobank\ImageUpload\Models\ImageFile;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LogLevel;

date_default_timezone_set('Asia/Seoul');

abstract class Channel {
	use LoggerTrait;

	protected $API_VERSION = "/v1";

	protected $apiUrl = "";
	protected $headers = "";
	protected $debug = false;
	protected $logFileFullPath= "";
	protected $httpCode=0;

	public function __construct($apiUrl, $logFileFullPath, $debug = false) {
		$this->apiUrl = $apiUrl;
		$this->debug = $debug;
		$this->logFileFullPath = $logFileFullPath;
		$this->debug = $debug;

		$supports = require __DIR__ . "/../Support/Support.php";

        $userAgent = "@" . $supports['package_name'] . "/" . $supports['version'] . " php/" . phpversion();
		$this->headers =array(
			'Accept: application/json',
			'charset=utf-8',
			'user-agent:' . $userAgent,
		);

		if ($debug == true){
			if($this->getLogger() == null){
				$this->setLogger(
					new Logger('Infobank')
				);
			}

			if ($logFileFullPath != null && sizeof($logFileFullPath) > 0){
				$streamHandler = new StreamHandler($logFileFullPath, Logger::DEBUG);
				$this->getLogger()->pushHandler($streamHandler);
			}
		}
	}

	public function addHeader($key, $value){
    	$this->headers[] = $key . ': ' . $value;
	}

	public function getHeaders(){
		return $this->headers;
	}

	public function getApiUrl(){
		return $this->apiUrl;
	}

	public function post(Message $data){
		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
				
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				
		curl_setopt($curl, CURLOPT_URL, $this->getApiUrl());

		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

		curl_setopt($curl, CURLINFO_HEADER_OUT, true);
		
		$response = curl_exec($curl);

		if ($this->debug == true){
			$this->log(
				LogLevel::DEBUG,
				'Request:' . json_encode($data) . ' Response:' . $response,
				[
					'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
					'header' => curl_getinfo($curl, CURLINFO_HEADER_OUT),
					'total_time' => curl_getinfo($curl, CURLINFO_TOTAL_TIME),
				]
			);
		}

		if ($response === false) {
			$error_code = curl_errno($curl);
			$error_message = curl_error($curl);

			if ($this->debug == true){
				$this->log(
					LogLevel::ERROR,
					'curl_error',
					[
						'error_code' => $error_code,
						'error_message' => $error_message,
						'info' => curl_getinfo($curl)
					]
				);
			}

			curl_close($curl);

			throw new HttpRequestException("code:" . $error_code . ", message : ".$error_message."\n");
			
		}
		
		$this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		curl_close($curl);
		return $response;
	}

	public function post_data(
        ImageFile $ImageUpload
    ){
        $apiUrl = $this->apiUrl . "/" . $ImageUpload->getServiceType();

        $curl = curl_init();		

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
				
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				
		curl_setopt($curl, CURLOPT_URL, $apiUrl);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'file' => '@' . $ImageUpload->getFileName() . ';type=' . mime_content_type($ImageUpload->getFileName())
        ]); 
		
		$response = curl_exec($curl);

		if ($this->debug == true){
			$this->log(
				LogLevel::DEBUG,
				'Response:' . $response,
				[
					'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
					'header' => curl_getinfo($curl, CURLINFO_HEADER_OUT),
					'total_time' => curl_getinfo($curl, CURLINFO_TOTAL_TIME),
				]
			);
		}

		if ($response === false) {
			$error_code = curl_errno($curl);
			$error_message = curl_error($curl);

			if ($this->debug == true){
				$this->log(
					LogLevel::ERROR,
					'curl_error',
					[
						'error_code' => $error_code,
						'error_message' => $error_message,
						'info' => curl_getinfo($curl)
					]
				);
			}

			curl_close($curl);
			throw new HttpRequestException("code:" . $error_code . ", message : ".$error_message."\n");
			
		}

		$this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		curl_close($curl);
		return $response;
    }

	public function get_message_form(
		$formId
	){
		$apiUrl = $this->apiUrl . "/" . $formId;

		$curl = curl_init();
		

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
				
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				
		curl_setopt($curl, CURLOPT_URL, $apiUrl);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());

		curl_setopt($curl, CURLINFO_HEADER_OUT, true);

		
		$response = curl_exec($curl);

		if ($this->debug == true){
			$this->log(
				LogLevel::DEBUG,
				'Response:' . $response,
				[
					'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
					'header' => curl_getinfo($curl, CURLINFO_HEADER_OUT),
					'total_time' => curl_getinfo($curl, CURLINFO_TOTAL_TIME),
				]
			);
		}

		if ($response === false) {
			$error_code = curl_errno($curl);
			$error_message = curl_error($curl);
			
			if ($this->debug == true){
				$this->log(
					LogLevel::ERROR,
					'curl_error',
					[
						'error_code' => $error_code,
						'error_message' => $error_message,
						'info' => curl_getinfo($curl)
					]
				);
			}

			curl_close($curl);

			throw new HttpRequestException("code:" . $error_code . ", message : ".$error_message."\n");
			
		}

		$this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);

		return $response;
	}

	public function put_message_form(
		$formId,
		Message $data
	){
		$apiUrl = $this->apiUrl . "/" . $formId;

		$curl = curl_init();
		
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
				
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				
		curl_setopt($curl, CURLOPT_URL, $apiUrl);

		$this->addHeader("Content-Type", "application/json");
		
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");

		curl_setopt($curl, CURLINFO_HEADER_OUT, true);

		
		$response = curl_exec($curl);

		if ($this->debug == true){
			$this->log(
				LogLevel::DEBUG,
				'Request:' . json_encode($data) . ' Response:' . $response,
				[
					'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
					'header' => curl_getinfo($curl, CURLINFO_HEADER_OUT),
					'total_time' => curl_getinfo($curl, CURLINFO_TOTAL_TIME),
				]
			);
		}

		if ($response === false) {
			$error_code = curl_errno($curl);
			$error_message = curl_error($curl);
			
			if ($this->debug == true){
				$this->log(
					LogLevel::ERROR,
					'curl_error',
					[
						'error_code' => $error_code,
						'error_message' => $error_message,
						'info' => curl_getinfo($curl)
					]
				);
			}

			curl_close($curl);

			throw new HttpRequestException("code:" . $error_code . ", message : ".$error_message."\n");
			
		}
		
		$this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		curl_close($curl);

		return $response;
	}

	public function delete_message_form(
		$formId
	){
		$apiUrl = $this->apiUrl . "/" . $formId;

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
				
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				
		curl_setopt($curl, CURLOPT_URL, $apiUrl);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

		curl_setopt($curl, CURLINFO_HEADER_OUT, true);
		
		$response = curl_exec($curl);

		if ($this->debug == true){
			$this->log(
				LogLevel::DEBUG,
				'Response:' . $response,
				[
					'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
					'header' => curl_getinfo($curl, CURLINFO_HEADER_OUT),
					'total_time' => curl_getinfo($curl, CURLINFO_TOTAL_TIME),
				]
			);
		}

		if ($response === false) {
			$error_code = curl_errno($curl);
			$error_message = curl_error($curl);
			
			if ($this->debug == true){
				$this->log(
					LogLevel::ERROR,
					'curl_error',
					[
						'error_code' => $error_code,
						'error_message' => $error_message,
						'info' => curl_getinfo($curl)
					]
				);
			}

			curl_close($curl);
			
			throw new HttpRequestException("code:" . $error_code . ", message : ".$error_message."\n");
			
		}

		$this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);

		return $response;
	}

	public function get_reports(
		
	){
		$curl = curl_init();	

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
				
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				
		curl_setopt($curl, CURLOPT_URL, $this->apiUrl);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());

		curl_setopt($curl, CURLINFO_HEADER_OUT, true);
		
		$response = curl_exec($curl);

		if ($this->debug == true){
			$this->log(
				LogLevel::DEBUG,
				'Response:' . $response,
				[
					'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
					'header' => curl_getinfo($curl, CURLINFO_HEADER_OUT),
					'total_time' => curl_getinfo($curl, CURLINFO_TOTAL_TIME),
				]
			);
		}

		if ($response === false) {
			$error_code = curl_errno($curl);
			$error_message = curl_error($curl);
			
			if ($this->debug == true){
				$this->log(
					LogLevel::ERROR,
					'curl_error',
					[
						'error_code' => $error_code,
						'error_message' => $error_message,
						'info' => curl_getinfo($curl)
					]
				);
			}

			curl_close($curl);

			throw new HttpRequestException("code:" . $error_code . ", message : ".$error_message."\n");
			
		}

		$this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);

		return $response;
	}

	public function delete_report(
		$reportId
	){
		$apiUrl = $this->apiUrl . "/" . $reportId;

		$curl = curl_init();		

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
				
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				
		curl_setopt($curl, CURLOPT_URL, $apiUrl);

		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());

		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

		curl_setopt($curl, CURLINFO_HEADER_OUT, true);
		
		$response = curl_exec($curl);

		if ($this->debug == true){
			$this->log(
				LogLevel::DEBUG,
				'Response:' . $response,
				[
					'http_code' => curl_getinfo($curl, CURLINFO_HTTP_CODE),
					'header' => curl_getinfo($curl, CURLINFO_HEADER_OUT),
					'total_time' => curl_getinfo($curl, CURLINFO_TOTAL_TIME),
				]
			);
		}

		if ($response === false) {
			$error_code = curl_errno($curl);
			$error_message = curl_error($curl);
			
			if ($this->debug == true){
				$this->log(
					LogLevel::ERROR,
					'curl_error',
					[
						'error_code' => $error_code,
						'error_message' => $error_message,
						'info' => curl_getinfo($curl)
					]
				);
			}

			curl_close($curl);

			throw new HttpRequestException("code:" . $error_code . ", message : ".$error_message."\n");
			
		}

		$this->httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		
		curl_close($curl);

		return $response;
	}

	public function getHttpCode(){
		return $this->httpCode;
	}
}
?>