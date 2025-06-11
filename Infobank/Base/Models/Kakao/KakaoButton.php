<?php
namespace Infobank\Base\Models\Kakao;

abstract class KakaoButton {
    protected $type;
    protected $name;
    protected $urlPc;
    protected $urlMobile;
    protected $schemeIos;
    protected $schemeAndroid;
    protected $chatExtra;
    protected $chatEvent;
    protected $bizFormKey;
    protected $bizFormId;

    /**
     * @return string 카카오 버튼 종류 
     */
    abstract function getType(

    );

    /**
     * @return string 카카오 버튼 명
     */
    abstract function getName(

    );

    /**
     * @return string PC 환경에서 버튼 클릭시 이동할 URL
     */
    abstract function getUrlPc(

    );

    /**
     * @return string 모바일 환경에서 버튼 클릭 시 이동할 URL
     */
    abstract function getUrlMobile(

    );

   
    /**
     * @return string iOS 환경에서 버튼클릭 시 실행할 application custom scheme
     */
    abstract function getSchemeIos(

    );



    /**
     * @return string Android 환경에서 버튼클릭 시 실행 할 application custom scheme
     */
    abstract function getSchemeAndroid(

    );


    /**
     * @return string 봇/상담톡전환 시 전달할 메타정보
     */
    abstract function getChatExtra(

    );

    /**
     * @return string 봇/상담톡 전환 시 연결할 이벤트 명
     */
    abstract function getChatEvent(

    );


    /**
     * @return string 비즈폼 키
     */
    abstract function getBizFormKey(

    );
    

    /**
     * @return string 비즈폼 ID
     */
    abstract function getBizFormId(

    );

    /**
     * 웹링크
     * 
     * 버튼 클릭 시 이동할 pc/mobile환경별 web url
     * 
     * @param string $urlMobile 모바일 환경에서 버튼 클릭 시 이동할 URL
     * @param string $urlPc PC 환경에서 버튼 클릭시 이동할 URL
     * @return $this
     */
    abstract function makeWlButton(
        $urlMobile,
        $urlPc = null
    );

    /**
     * 앱 링크
     * 
     * scheme_ios, scheme_android, url_mobile 중 2가지 필수 입력 
     * 
     * @param string $schemeAndroid Android 환경에서 버튼클릭 시 실행 할 application custom scheme
     * @param string|null $schemeIos iOS 환경에서 버튼클릭 시 실행할 application custom scheme
     * @param string|null $urlMobile 모바일 환경에서 버튼 클릭 시 이동할 URL
     * @param string|null $urlPc PC 환경에서 버튼 클릭시 이동할 URL
     * @return $this
     */
    abstract function makeAlButton(
        $schemeAndroid,
        $schemeIos,
        $urlMobile = null,
        $urlPc = null
    );

    /**
     * 봇 키워드
     * 
     * 해당 버튼 텍스트 전송
     * 
     * @return $this
     */
    abstract function makeBkButton(
        
    );
    
    /**
     * 메시지 전달
     * 
     * 해당 버튼 텍스트 + 메시지 본문 전송
     * 
     * @return $this
     */
    abstract function makeMdButton(

    );

    /**
     * 배송조회
     * 
     * 버튼 클릭 시 배송 조회 페이지로 이동
     * 
     * @return $this
     */
    abstract function makeDsButton(

    );

    /**
     * 상담톡 전환
     * 
     * 상담톡을 이용하는 카카오톡 채널만 이용 가능
     * 
     * @param string|null $chatExtra 봇/상담톡전환 시 전달할 메타정보
     * @return $this
     */
    abstract function makeBcButton(
        $chatExtra = null
    );

    /**
     * 챗봇 전환
     * 
     * 카카오 I 오픈빌더의 챗봇을 사용하는 카카오톡 채널만 이용가능
     * 
     * @param string|null $chatExtra 봇/상담톡전환 시 전달할 메타정보
     * @param string|null $chatEvent 봇/상담톡 전환 시 연결할 이벤트 명
     * @return $this
     */
    abstract function makeBtButton(
        $chatExtra = null,
        $chatEvent = null
    );

    /**
     * 채널 추가
     * 
     * 버튼 클릭 시 카카오톡 채널 추가
     * 
     * @return $this
     */
    abstract function makeAcButton(

    );

    /**
     * 비즈폼
     * 
     * 카카오 비즈니스에서 생성한 비즈니스폼 ID
     * 
     * @param string|null $bizFormKey 비즈폼 키
     * @param string|null $bizFormId 비즈폼 ID
     * @return $this
     */
    abstract function makeBfButton(
        $bizFormKey = null,
        $bizFormId = null
    );
}


?>