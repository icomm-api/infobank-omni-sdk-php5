# 서비스 소개

---------------------------------------
## 개요
인포뱅크 OMNI API는 간편하게 연동 할 수 있는 통합메시지 API 입니다.

다양한 채널의 메시지 ( SMS, MMS, 국제메시지, RCS, 카카오 비즈메시지, PUSH 등 ) 발송 및 리포트 결과, 메시지 간 Fallback 기능을 제공합니다.


## 설치방법
php5.x 에서 사용가능합니다.

아래 명령어를 통해 composer 2.x설치를 진행합니다.
```shell
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --version=2.x --install-dir=/usr/local/bin --filename=composer
```

아래 명령어를 통해 패키시 의존성 설치를 진행합니다.
```shell
cd omni_sdk_php

composer install
```


## 사용법

sdk 사용을 위해서는 [인포뱅크 비즈플러스](https://www.ibizplus.co.kr/main)를 통해 계정 발급 후 사용할 수 있습니다.


아래와 같이 api 인스턴트 생성 후 발송을 진행 할 수 있습니다.
```php
use Infobank\InfobankClient;

$api = new InfobankClient(<apiUrl>, <clientId>, <clientPasswd>);
```


SMS Message 생성 예제 소스 입니다.
```php
use Infobank\Sms\Models\SMSMessage;

$message = (new SMSMessage(
    "0316281500",
    "01012341234",
    "test message."
))
->setOriginCID("1234")
->setRef("ref");

```
message 생성후 아래와 같이  발송할 수 있습니다.
```php
$response = $api->sendMessage($message);
```

발송 응답 결과는 아래와 같습니다.
```php
echo "code : " . $response->getCode() . "\r\n";
echo "result : " . $response->getResult() . "\r\n";
echo "msgKey : " . $response->getMsgKey() . "\r\n";
echo "ref : " . $response->getRef() . "\r\n";
```
sdk debug 로그를 생성할 수 있습니다.

로그파일명을 null로 넣을 경우 STDOUT으로 콘솔에 로그를 확인 할 수 있습니다.
```php
$api->setSdkDebugLog(<로그파일명>, [true|false]);
```

## 레포트 수신
레포트는 polling 방식으로 제공되며 아래와 같이 수신 받을 수 있습니다.

ReportApi 인스턴트를 생성합니다.
```php
use Infobank\InfobankClient;

$api = new InfobankClient(
    $client['api_url'],
    $client['client_id'],
    $client['client_passwd']
);

```
getReports() 함수를 호출하여 report를 수신합니다.
```php
$response = $api->getReports(

);

```
레포트는 List형태로 수신됩니다.
```php
echo "status_code : " . $response->getHttpCode() . "\r\n";
echo "code : " . $response->getCode() . "\r\n";
echo "result : " . $response->getResult() . "\r\n";
echo "reportId : " . $response->getData()->getReportId() . "\r\n";

foreach($response->getData()->getReport() as $report ){
    echo "msgKey:".$report->getMsgKey()." serviceType:".$report->getServiceType()." msgType:".$report->getMsgType()
    ." reportType:".$report->getReportType()." reportCode:".$report->getReportCode()." reportTime:".$report->getReportTime()
    ." carrier:".$report->getCarrier()." resCnt:".$report->getResCnt()." ref:".$report->getRef() . "\r\n";
}
```
레포트 수신 확인 후 reportId로 delete method를 호출해야 다음 레포트를 받을 수 있습니다.

```php
$response = $api->deleteReports(
    $response->getData()->getReportId()
);

echo "status_code : " . $response->getHttpCode() . "\r\n";
echo "code : " . $response->getCode() . "\r\n";
echo "result : " . $response->getResult() . "\r\n";
```


자세한 규격 및 결과코드는 [Omni Api Specification](https://omniapi.gitbook.io/omni-api-specification/, "") 에서 확인 할 수 있습니다.
