<?php
namespace Infobank\Report;

use Infobank\Report\Models\ApiResponse;

class ReportApi extends \Infobank\Base\RestClient {

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
        parent::__construct(
            $apiUrl,
            $clientId,
            $clientPasswd
        );
    }

    public function getReports(

    ){
        $response = $this->requestReports(

        );

        return new ApiResponse(
            $this->httpCode,
            json_decode(
                $response,
                true
            )
        );
    }

    public function deleteReports(
        $reportId
    ){
        $response = $this->deleteReportsFromReportId(
            $reportId
        );

        return new ApiResponse(
            $this->httpCode,
            json_decode(
                $response,
                true
            )
        );
    }
} 

?>