<?php
namespace Infobank\Base\Channel;

require 'vendor/autoload.php';

use Infobank\Base\Exceptions\AuthenticationException;
use Infobank\Base\Models\TokenResponse;

$token_expired=0;
$auth_token=null;

class AuthChannel extends Channel{
	private $clientId = "";
	private $clientPasswd = "";
	
    public function __construct($apiUrl, $clientId, $clientPasswd){
		$this->apiUrl = $apiUrl . $this->API_VERSION . '/auth/token';
		$this->clientId =$clientId;
		$this->clientPasswd = $clientPasswd;
    }
	
	public function requestToken() {
		global $token_expired;
		global $auth_token;

		if ($token_expired < time()){
			$curl = curl_init();

			$this->addHeader("Content-Type", "application/json");
			$this->addHeader("X-IB-Client-Id", $this->clientId);
			$this->addHeader("X-IB-Client-Passwd", $this->clientPasswd);

			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');
			curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($curl, CURLOPT_URL, $this->apiUrl);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $this->getHeaders());
			
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

			$response = curl_exec($curl);
			
			if ($response === false) {
				$error_code = curl_errno($curl);
				$error_message = curl_error($curl);
				curl_close($curl);
				throw new AuthenticationException("code:" . $error_code . ", message : ".$error_message."\n");
				
			} else {
				$http_status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			}

			if ($http_status_code != 200){
				curl_close($curl);
				throw new AuthenticationException("http_status_code:".$http_status_code." apiUrl:".$this->apiUrl." clientId:".$this->clientId." clientPasswd:".$this->clientPasswd);
			}
			
			$auth_token = new TokenResponse(
				json_decode($response)
			);
					
			curl_close($curl);
			
			$token_expired = time() + 86000;
		}
		
		return $auth_token;
	}
}

?>