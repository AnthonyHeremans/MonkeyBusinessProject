<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 15:44
 */
date_default_timezone_set('Europe/Brussels');
use controller\EventController;
use model\Event;

//use controller\EventController;


class EventControllerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockEventRepository = $this->getMockBuilder('model\PDOEventRepository')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockView = $this->getMockBuilder('view\EventJsonView')
            ->getMock();
    }

    public function tearDown()
    {
        $this->mockEventRepository = null;
        $this->mockView = null;
    }

    public function test_findEventById()
    {
        $event = new Event("NewEvent", new DateTime('2011-03-11'), new DateTime('2011-03-12'), rand(), rand());

        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('findEventById')
            ->will($this->returnValue($event));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleFindEventById($event->getId(rand()));
    }
    public function test_findBetweenTwoDates()
    {
        $event = new Event("NewEvent", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $events = [$event];
        $this->mockEventRepository->expects($this->atLeastOnce())->method('findBetweenTwoDates')->will($this->returnValue($events));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleEventBetweenTwoDates(new DateTime("1990-10-01"), new DateTime("2010-10-01"));
    }
    public function test_findBEventByName()
    {
        $event = new Event("NewEvent", new DateTime('2011-03-11'), new DateTime('2011-03-12'), rand(), rand());

        $this->mockEventRepository->expects($this->atLeastOnce())
            ->method('findEventByName')
            ->will($this->returnValue($event));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleFindEventByName($event->getName(rand()));
    }
    public function test_findAllEvents()
    {
        $event = new Event("NAME", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $events = [$event];
        $this->mockEventRepository->expects($this->atLeastOnce())->method('findAllEvents')->will($this->returnValue($events));
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleFindAllEvents();
    }

    public function test_addEvent()
    {
        $event = new Event("NAME", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $this->mockEventRepository->expects($this->atLeastOnce())->method('addEvent');
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleEventAdd($event);
    }
    public function test_editEvent()
    {
        $event = new Event("NAME", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $this->mockEventRepository->expects($this->atLeastOnce())->method('editEvent');
        $eventController = new EventController($this->mockEventRepository, $this->mockView);
        $eventController->handleEditEvent($event);
    }

}
