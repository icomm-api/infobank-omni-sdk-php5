<?php
namespace Infobank\Report\Models;

class ResponseData {
    private $reportId;
    private $report;

    public function __construct(
        $data
    ){
        $this->jsonDeserialize($data);
    }

    public function getReportId(

    ){
        return $this->reportId;
    }

    public function getReport(

    ){
        $report = [];
        foreach ($this->report as $data) {
            $report[] = new Report(
                isset($data['msgKey']) ? $data['msgKey'] : "",
                isset($data['serviceType']) ? $data['serviceType'] : "",
                isset($data['msgType']) ? $data['msgType'] : "",
                isset($data['reportType']) ? $data['reportType'] : "",
                isset($data['reportCode']) ? $data['reportCode'] : "",
                isset($data['reportTime']) ? $data['reportTime'] : "",
                isset($data['carrier']) ? $data['carrier'] : "",
                isset($data['resCnt']) ? $data['resCnt'] : "",
                isset($data['ref']) ? $data['ref'] : ""
            );
        }
        return $report;
    }

    private function jsonDeserialize(
        $data
    ) {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}

?>