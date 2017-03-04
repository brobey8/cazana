<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 4/3/17
 * Time: 2:31 PM
 */

namespace Cazana;


class Event
{
    protected $id = null;
    protected $event_type = null;
    protected $date = null;
    protected $mileage = null;
    protected $result = null;
    protected $price = null;
    protected $from_vrm = null;
    protected $to_vrm = null;

    private $eventTypes = ['ADVERTISED_FOR_SALE', 'MOT_TEST', 'VRM_CHANGE'];

    public function setId($id) {
        $this->id = $id;
    }

    public function setEventType($event_type) {
        if(!in_array($event_type, $this->eventTypes)) {
            throw new \Exception('Unrecognised event type');
        }
        else {
            $this->event_type = $event_type;
        }
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setMileage($mileage) {
        $this->mileage = $mileage;
    }

    public function setResult($result) {
        $this->result = $result;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setFromVrm($from_vrm) {
        $this->from_vrm = $from_vrm;
    }

    public function setToVrm($to_vrm) {
        $this->to_vrm = $to_vrm;
    }




    public function getId() {
        return $this->id;
    }


}