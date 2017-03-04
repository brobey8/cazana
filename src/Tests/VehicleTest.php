<?php
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    public function testNamespacing() {
        $vehicle = new Cazana\Vehicle();
    }

    public function testSetEvent() {
        $vehicle = new \Cazana\Vehicle();

        $event = new \Cazana\Event();
        $event->setId(1);
        $event->setEventType('ADVERTISED_FOR_SALE');
        $event->setDate('10-10-2010');
        $event->setMileage(10000);
        $event->setPrice(10000.00);

        $vehicle->addEvent($event);
    }



}
?>

