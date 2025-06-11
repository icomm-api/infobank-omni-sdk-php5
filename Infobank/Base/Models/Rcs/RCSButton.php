<?php
namespace Infobank\Base\Models\Rcs;

require 'vendor/autoload.php';

abstract class RCSButton {
    protected $type;
    protected $name;
    protected $url;
    protected $label;
    protected $latitude;
    protected $longitude;
    protected $fallbackUrl;
    protected $query;
    protected $startTime;
    protected $endTime;
    protected $title;
    protected $description;
    protected $text;
    protected $phoneNumber;


    /**
     * URL 연결
     * 
     * Web page 또는 App으로 이동할 수 있습니다.
     * 
     * @param string $url 웹브라우저로 연결할 URL주소
     * @return $this
     */
    abstract function makeUrlButton(
        $url
    );

    /**
     * 지도 보여주기
     * 
     * 지정된 좌표로 설정된 지도 App을 실행합니다.
     * 
     * @param string $latitude 위도 값
     * @param string $longitude 경도 값
     * @param string|null $label 지도 App에 표시될 라벨명
     * @param string|null $fallbackUrl 지도 App동작이 안 될 경우 대처할 URL
     * @return $this
     */
    abstract function makeMapLocButton(
        $latitude,
        $longitude,
        $label = null,
        $fallbackUrl = null
    );

    /**
     * 지도 검색
     * 
     * 검색어를 통해 조회된 지도 App을 실행합니다.
     * 
     * @param string $query 지도 App에서 검색할 구문
     * @param string|null $fallbackUrl 지도 App동작이 안 될 경우 대처할 URL
     * @return $this
     */
    abstract function makeMapQryButton(
        $query,
        $fallbackUrl = null
    );

    /**
     * 위치 전송
     * 
     * 휴대폰의 현재 위치 정보를 전송합니다.
     * 
     * @return $this
     */
    abstract function makeMapSendButton(
        
    );

    /**
     * 일정 등록
     * 
     * 정해진 일자와 내용으로 일정을 등록합니다.
     * 
     * @param string|null $startTime 시작 일정(yyyy-MM-dd’T’HH:mm:ssXXX)
     * @param string|null $endTime 종료 일정(yyyy-MM-dd’T’HH:mm:ssXXX)
     * @param string|null $title 
     * @param string|null $description
     * @return $this
     */
    abstract function makeCalendarButton(
        $startTime = null,
        $endTime = null,
        $title = null,
        $description = null
    );

    /**
     * 복사하기
     * 
     * 지정된 내용을 클립보드로 복사합니다.
     * 
     * @param string $text 클립보드로 복사될 내용
     * @return $this
     */
    abstract function makeCopyButton(
        $text
    );

    /**
     * 대화방 열기 (문자)
     * 
     * 메시지 App을 실행합니다.
     * 
     * @param string $phoneNumber 대화방의 수신자 번호
     * @param string|null $text 내용
     * @return $this
     */
    abstract function makeComTButton(
        $phoneNumber,
        $text = null
    );

    /**
     * 대화방 열기 (음성, 영상)
     * 
     * 메시지 App을 실행합니다.
     * 
     * @param string $phoneNumber 대화방의 수신자 번호
     * @return $this
     */
    abstract function makeComVButton(
        $phoneNumber
    );

    /**
     * 전화 연결
     * 
     * 특정 전화번호로 전화를 걸 수 있습니다.
     * 
     * @param string $phoneNumber 대화방의 수신자 번호
     * @return $this
     */
    abstract function makeDialButton(
        $phoneNumber
    );

    /**
     * @return string 버튼 종류
     */
    abstract function getType(

    );

    /**
     * @param string 버튼 종류
     */
    abstract function setType(
        $type
    );

    /**
     * @return string 버튼 명
     */
    abstract function getName(

    );

    /**
     * @return string 웹브라우저로 연결할 URL주소
     */
    abstract function getUrl(

    );

    /**
     * @param string $url 웹브라우저로 연결할 URL주소
     */
    abstract function setUrl(
        $url
    );

    /**
     * @return string 지도 App에 표시될 라벨명
     */
    abstract function getLabel(

    );

    /**
     * @param string $label 지도 App에 표시될 라벨명
     */
    abstract function setLabel(
        $label
    );

    /**
     * @return string 위도 값(예)37.4001971
     */
    abstract function getLatitude(
        
    );

    /**
     * @param string $latitude 위도 값(예)37.4001971
     */
    abstract function setLatitude(
        $latitude
    );

    /**
     * @return string 경도 값(예)127.1071718
     */
    abstract function getLongitude(

    );

    /**
     * @param string $longitude 경도 값(예)127.1071718
     */
    abstract function setLongitude(
        $longitude
    );

    /**
     * @return string 지도 App동작이 안 될 경우 대처할 URL
     */
    abstract function getFallbackUrl(

    );

    /**
     * @param string $fallbackUrl 지도 App동작이 안 될 경우 대처할 URL
     */
    abstract function setFallbackUrl(
        $fallbackUrl
    );

    /**
     * @return string 지도 App에서 검색할 구문
     */
    abstract function getQuery(

    );

    /**
     * @param string $query 지도 App에서 검색할 구문
     */
    abstract function setQuery(
        $query
    );

    /**
     * @return string 시작 일정(yyyy-MM-dd’T’HH:mm:ssXXX)
     */
    abstract function getStartTime(

    );

    /**
     * @param string $startTime 시작 일정(yyyy-MM-dd’T’HH:mm:ssXXX)
     */
    abstract function setStartTime(
        $startTime
    );

    /**
     * @return string 종료 일정(yyyy-MM-dd’T’HH:mm:ssXXX)
     */
    abstract function getEndTime(

    );

    /**
     * @param string $endTime 종료 일정(yyyy-MM-dd’T’HH:mm:ssXXX)
     */
    abstract function setEndTime(
        $endTime
    );

    /**
     * @return string 일정 제목
     */
    abstract function getTitle(

    );

    /**
     * @param string $title 일정 제목
     */
    abstract function setTitle(
        $title
    );

    /**
     * @return string 일정 내용
     */
    abstract function getDescription(

    );

    /**
     * @param string $description 일정 내용
     */
    abstract function setDescription(
        $description
    );

    /**
     * @return string 내용
     */
    abstract function getText(

    );

    /**
     * @param string $text 내용
     */
    abstract function setText(
        $text
    );

    /**
     * @return string 대화방의 수신자 번호
     */
    abstract function getPhoneNumber(
        
    );

    /**
     * @param string $phoneNumber 대화방의 수신자 번호
     */
    abstract function setPhoneNumber(
        $phoneNumber
    );
}

?>