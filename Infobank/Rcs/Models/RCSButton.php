<?php
namespace Infobank\Rcs\Models;

require 'vendor/autoload.php';


class RCSButton extends \Infobank\Base\Models\Rcs\RCSButton implements \JsonSerializable{

    /**
     * @param string $name 버튼 명
     */
    public function __construct(
        $name
    ){
        $this->name = $name;
    }

    public function makeUrlButton(
        $url
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::URL;
        $this->url = $url;
        
        return $this;
    }

    public function makeMapLocButton(
        $latitude,
        $longitude,
        $label = null,
        $fallbackUrl = null
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::MAP_LOC;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->label = $label;
        $this->fallbackUrl = $fallbackUrl;

        return $this;
    }

    public function makeMapQryButton(
        $query,
        $fallbackUrl = null
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::MAP_QRY;
        $this->query = $query;
        $this->fallbackUrl = $fallbackUrl;

        return $this;
    }

    public function makeMapSendButton(
        
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::MAP_SEND;

        return $this;
    }

    public function makeCalendarButton(
        $startTime = null,
        $endTime = null,
        $title = null,
        $description = null
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::CALENDAR;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->title = $title;
        $this->description = $description;

        return $this;
    }

    public function makeCopyButton(
        $text
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::COPY;
        $this->text = $text;

        return $this;
    }

    public function makeComTButton(
        $phoneNumber,
        $text = null
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::COM_T;
        $this->phoneNumber = $phoneNumber;
        $this->text = $text;

        return $this;
    }

    public function makeComVButton(
        $phoneNumber
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::COM_V;
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function makeDialButton(
        $phoneNumber
    ){
        $this->type = \Infobank\Base\Models\Rcs\RCSButtonType::DIAL;
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getType(

    ){
        return $this->type;
    }

    public function setType(
        $type
    ){
        $this->type = $type;
        return $this;
    }

    public function getName(

    ){
        return $this->name;
    }

    public function getUrl(

    ){
        return $this->url;
    }

    public function setUrl(
        $url
    ){
        $this->url = $url;
        return $this;
    }

    public function getLabel(

    ){
        return $this->label;
    }

    public function setLabel(
        $label
    ){
        $this->label = $label;
        return $this;
    }

    public function getLatitude(
        
    ){
        return $this->latitude;
    }

    public function setLatitude(
        $latitude
    ){
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(

    ){
        return $this->longitude;
    }

    public function setLongitude(
        $longitude
    ){
        $this->longitude = $longitude;
        return $this;
    }

    public function getFallbackUrl(

    ){
        return $this->fallbackUrl;
    }

    public function setFallbackUrl(
        $fallbackUrl
    ){
        $this->fallbackUrl = $fallbackUrl;
        return $this;
    }

    public function getQuery(

    ){
        return $this->query;
    }

    public function setQuery(
        $query
    ){
        $this->query = $query;
        return $this;
    }

    public function getStartTime(

    ){
        return $this->startTime;
    }

    public function setStartTime(
        $startTime
    ){
        $this->startTime = $startTime;
        return $this;
    }

    public function getEndTime(

    ){
        return $this->endTime;
    }

    public function setEndTime(
        $endTime
    ){
        $this->endTime = $endTime;
        return $this;
    }

    public function getTitle(

    ){
        return $this->title;
    }

    public function setTitle(
        $title
    ){
        $this->title = $title;
        return $this;
    }

    public function getDescription(

    ){
        return $this->description;
    }

    public function setDescription(
        $description
    ){
        $this->description = $description;
        return $this;
    }

    public function getText(

    ){
        return $this->text;
    }

    public function setText(
        $text
    ){
        $this->text = $text;
        return $this;
    }

    public function getPhoneNumber(

    ){
        return $this->phoneNumber;
    }

    public function setPhoneNumber(
        $phoneNumber
    ){
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function jsonSerialize(

    ){
        $vars = get_object_vars($this);
        $filteredVars = [];

        foreach ($vars as $key => $value) {
            if ($value !== null) {
                $filteredVars[$key] = $value;
            }
        }

        return $filteredVars;
    }
}
?>