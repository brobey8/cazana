<?php
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    public function testNamespacing() {
        $event = new Cazana\Event();
        $this->assertInstanceOf(Cazana\Event::class, $event);
    }

    public function testSetEventType() {
        $event = new Cazana\Event();
        $event->setEventType('ADVERTISED_FOR_SALE');
        $this->assertEquals($event->getEventType(), 'ADVERTISED_FOR_SALE');
    }

    public function testSetInvalidEventType() {
        $event = new Cazana\Event();
        $this->setExpectedException(Exception::class);
        $event->setEventType('INVALID_EVENT_TYPE');
    }


}
?>

