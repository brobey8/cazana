<?php
/**
 * Created by PhpStorm.
 * User: ben
 * Date: 4/3/17
 * Time: 2:31 PM
 */

namespace Cazana;


class Vehicle
{
    protected $id = null;
    protected $vrm = null;
    protected $make = null;
    protected $model = null;
    protected $first_registration_date = null;
    protected $events = [];

    public function setId($id) {
        $this->id = $id;
    }

    public function setVrm($vrm) {
        $this->vrm = $vrm;
    }

    public function setMake($make) {
        $this->make = $make;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setFirstRegistrationDate($first_registration_date) {
        $this->first_registration_date = $first_registration_date;
    }

    public function addEvent(Event $event) {
        array_push($this->events, $event);
    }


    public function getId() {
        return $this->id;
    }

    public function getVrm() {
        return $this->vrm;
    }

    public function getMake() {
        return $this->make;
    }

    public function getModel() {
        return $this->model;
    }

    public function getFirstRegistrationDate() {
        return $this->first_registration_date;
    }

    public function getEvents() {
        return $this->events;
    }

    public function calculateAverageMilage() {
        if($this->first_registration_date == null) {
            throw new \Exception('No first registation date set, cannot calculate');
        }
        //calculate the average annual milage based off the last event that we have
        $lastEvent = null;
        foreach($this->events as $event) {
            //we only need to look at these two event types, as the others do not store milage info
            if(in_array($event->getEventType(), ['ADVERTISED_FOR_SALE', 'MOT_TEST'])) {
                if($lastEvent == null || ($event->getDate() > $lastEvent->getDate())) {
                    $lastEvent = $event;
                }
            }
        }
        if($lastEvent == null) {
            $average = 7900;
        }
        else {
            //return the last milage divided by the age of the car (at that time)
            $average = $lastEvent->getMilage() / ($lastEvent->getDate()->format('Y') - $this->first_registration_date->format('Y'));
        }
        return $average;
    }

    public function calculateCurrentMilage() {
        $current = new \DateTime();

        return $this->calculateAverageMilage() * ($current->format('Y') - $this->first_registration_date->format('Y'));
    }

}