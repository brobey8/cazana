<?php
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    public function testNamespacing() {
        $vehicle = new Cazana\Vehicle();
        $this->assertInstanceOf(Cazana\Vehicle::class, $vehicle);
    }

    public function testAddEvent() {
        $vehicle = new \Cazana\Vehicle();

        $event = new \Cazana\Event();
        $event->setId(1);
        $event->setEventType('ADVERTISED_FOR_SALE');
        $event->setDate(new DateTime('10-10-2010'));
        $event->setMileage(10000);
        $event->setPrice(10000.00);

        $vehicle->addEvent($event);

        $this->assertContainsOnly(Cazana\Event::class, $vehicle->getEvents());
    }

    public function testAverageMilage() {
        $vehicle = new \Cazana\Vehicle();

        $event = new \Cazana\Event();
        $event->setId(1);
        $event->setEventType('ADVERTISED_FOR_SALE');
        $event->setDate(new DateTime('10-01-2000'));
        $event->setMileage(5000);
        $event->setPrice(50000.00);

        $event2 = new \Cazana\Event();
        $event2->setId(1);
        $event2->setEventType('MOT_TEST');
        $event2->setDate(new DateTime('10-05-2005'));
        $event2->setMileage(10000);
        $event->setResult(true);

        $event3 = new \Cazana\Event();
        $event3->setId(3);
        $event3->setEventType('VRM_CHANGE');
        $event3->setDate(new DateTime('10-10-2010'));
        $event3->setFromVrm('ABC-123');
        $event3->setToVrm('DEF-456');

        $event4 = new \Cazana\Event();
        $event4->setId(4);
        $event4->setEventType('ADVERTISED_FOR_SALE');
        $event4->setDate(new DateTime('10-01-2015'));
        $event4->setMileage(20000);
        $event4->setPrice(37000.00);

        $vehicle->addEvent($event);
        $vehicle->addEvent($event2);
        $vehicle->addEvent($event3);
        $vehicle->addEvent($event4);
        $vehicle->setFirstRegistrationDate(new DateTime('01-01-1998'));

        $this->assertGreaterThan(500, $vehicle->calculateAverageMilage());
    }

    public function testAverageMilageNoFirstRegistationDate() {
        //should throw an exception
        $vehicle = new \Cazana\Vehicle();

        $this->setExpectedException(Exception::class);
        $vehicle->calculateAverageMilage();
    }

    public function testAverageMilageNoEvents() {
        //testing the average milage when we have no events, should be 7,900
        $vehicle = new \Cazana\Vehicle();
        $vehicle->setFirstRegistrationDate(new DateTime('01-01-1998'));

        $this->assertEquals(7900, $vehicle->calculateAverageMilage());
    }

    public function testCurrentMilage() {
        $vehicle = new \Cazana\Vehicle();

        $event = new \Cazana\Event();
        $event->setId(1);
        $event->setEventType('ADVERTISED_FOR_SALE');
        $event->setDate(new DateTime('10-01-2000'));
        $event->setMileage(5000);
        $event->setPrice(50000.00);

        $event2 = new \Cazana\Event();
        $event2->setId(1);
        $event2->setEventType('MOT_TEST');
        $event2->setDate(new DateTime('10-05-2005'));
        $event2->setMileage(10000);
        $event->setResult(true);

        $event3 = new \Cazana\Event();
        $event3->setId(3);
        $event3->setEventType('VRM_CHANGE');
        $event3->setDate(new DateTime('10-10-2010'));
        $event3->setFromVrm('ABC-123');
        $event3->setToVrm('DEF-456');

        $event4 = new \Cazana\Event();
        $event4->setId(4);
        $event4->setEventType('ADVERTISED_FOR_SALE');
        $event4->setDate(new DateTime('10-01-2015'));
        $event4->setMileage(20000);

        $event4->setPrice(37000.00);

        $vehicle->addEvent($event);
        $vehicle->addEvent($event2);
        $vehicle->addEvent($event3);
        $vehicle->addEvent($event4);
        $vehicle->setFirstRegistrationDate(new DateTime('01-01-1998'));

        $this->assertGreaterThan(20000, $vehicle->calculateCurrentMilage());
    }

    public function testCurrentMilageNoEvents() {
        //should return the result of the vehicles age * 7900
        $vehicle = new \Cazana\Vehicle();

        $vehicle->setFirstRegistrationDate(new DateTime('01-01-1998'));

        $this->assertEquals($vehicle->calculateCurrentMilage(), 150100);
    }

    public function testCurrentMilageNoFirstRegistationDate() {
        //should throw an exception
        $vehicle = new \Cazana\Vehicle();

        $this->setExpectedException(Exception::class);
        $vehicle->calculateCurrentMilage();
    }


}
?>

