<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 21:27
 */
date_default_timezone_set('Europe/Brussels');
use model\Event;
use model\PDOEventRepository;

//use model\PDOEventRepository;


class PDOEventRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockPDO = $this->getMockBuilder('PDO')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockPDOStatement =
            $this->getMockBuilder('PDOStatement')
                ->disableOriginalConstructor()
                ->getMock();
    }
    public function tearDown()
    {
        $this->mockPDO = null;
        $this->mockPDOStatement = null;
    }
    public function test_getEvents()
    {
        $event1 = new Event("NAME", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $event2 = new Event("NAME", new DateTime('2001-01-01'), new DateTime('2001-12-13'), rand(), rand());
        $event1->setId(rand());
        $event2->setId(rand());
        $events = [$event1, $event2];

        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [
                        'id' => $event1->getId(),
                        'naam' => $event1->getName(),
                        'begindatum' => $event1->getStartdate()->format('Y-m-d'),
                        'einddatum' => $event1->getEnddate()->format('Y-m-d'),
                        'locatie' => $event1->getLocation(),
                        'personId' => $event1->getPersonId(),
                    ],
                    [
                        'id' => $event2->getId(),
                        'naam' => $event2->getName(),
                        'begindatum' => $event2->getStartdate()->format('Y-m-d'),
                        'einddatum' => $event2->getEnddate()->format('Y-m-d'),
                        'locatie' => $event2->getLocation(),
                        'personId' => $event2->getPersonId(),
                    ]
                ]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new PDOEventRepository($this->mockPDO);
        $actualEvents = $pdoRepository->findAllEvents();

        $this->assertEquals($events, $actualEvents);
    }
    public function test_getEventById()
    {
        $event = new Event("event", new DateTime('2000-01-01'), new DateTime('2000-01-01'), rand(), rand());
        $event->setId(rand());
        $this->mockPDOStatement->expects($this->atLeastOnce())->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [
                        'id' => $event->getId(),
                        'naam' => $event->getName(),
                        'begindatum' => $event->getStartdate()->format('Y-m-d'),
                        'einddatum' => $event->getEnddate()->format('Y-m-d'),
                        'locatie' => $event->getLocation(),
                        'personId' => $event->getPersonId(),
                    ]
                ]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEventRepository($this->mockPDO);
        $actualEvent = $pdoRepository->findEventById($event->getId());

        $this->assertEquals($event, $actualEvent);
    }

    public function test_getEventsBetweenDates()
    {
        $event1 = new Event("event1", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $event2 = new Event("event2", new DateTime('2001-01-01'), new DateTime('2001-12-12'), rand(), rand());
        $event1->setId(rand());
        $event2->setId(rand());
        $events = [$event1, $event2];

        $this->mockPDOStatement->expects($this->atLeastOnce())->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [
                        'id' => $event1->getId(),
                        'naam' => $event1->getName(),
                        'begindatum' => $event1->getStartdate()->format('Y-m-d'),
                        'einddatum' => $event1->getEnddate()->format('Y-m-d'),
                        'locatie' => $event1->getLocation(),
                        'personId' => $event1->getPersonId(),
                    ],
                    [
                        'id' => $event2->getId(),
                        'naam' => $event2->getName(),
                        'begindatum' => $event2->getStartdate()->format('Y-m-d'),
                        'einddatum' => $event2->getEnddate()->format('Y-m-d'),
                        'locatie' => $event2->getLocation(),
                        'personId' => $event2->getPersonId(),
                    ]
                ]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOEventRepository($this->mockPDO);

        $fromDate = new DateTime('2000-01-01');
        $untilDate = new DateTime('2010-01-01');
        $actualEvents = $pdoRepository->findBetweenTwoDates($fromDate, $untilDate);

        $this->assertEquals($events, $actualEvents);
    }
    public function test_createEvent_validEvent_eventCreated()
    {
        $event = new Event("event", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $this->mockPDOStatement->expects($this->atLeastOnce())->method('execute');
        $this->mockPDOStatement->expects($this->exactly(5))->method('bindParam');

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new PDOEventRepository($this->mockPDO);
        $pdoRepository->addEvent($event);

    }
    public function test_updateEvent_validEvent_eventUpdated()
    {
        $event = new Event("event", new DateTime('2000-01-01'), new DateTime('2000-12-12'), rand(), rand());
        $this->mockPDOStatement->expects($this->atLeastOnce())->method('execute');
        $this->mockPDOStatement->expects($this->exactly(6))->method('bindParam');

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));

        $pdoRepository = new PDOEventRepository($this->mockPDO);
        $pdoRepository->editEvent($event);
    }
}
