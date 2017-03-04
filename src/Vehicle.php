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

}