<?php


// dit moet allemaal in de git ignore
require_once 'vendor/autoload.php';
use \model\PDOEventRepository;
use \model\PDOPersonRepository;
use \view\EventJsonView;
use \controller\EventController;
use \controller\PersonController;

$user = 'root';
$password = 'root';
$database = 'monkeybusiness_WP1';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database",
                   $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);

    //aanmakenPDO
    $eventPDORepository = new PDOEventRepository($pdo);
    $personPDORepository = new PDOPersonRepository($pdo);

    //view
    $eventJsonView = new EventJsonView();
    $personJsonView = new \view\PersonJsonView();

    //controllers aanmaken
    $eventController = new EventController($eventPDORepository, $eventJsonView);
    $personController = new PersonController($personPDORepository, $personJsonView);





  /*  //?name=eerste%20event
   $eventName = isset($_REQUEST['eventName']) ? $_REQUEST['eventName'] : null;
    $eventController->handleFindEventByName($eventName);
    echo($eventName);
    //?eventId=1
    $eventId = isset($_REQUEST['eventId']) ? $_REQUEST['eventId'] : null;
    $eventController->handleFindEventById($eventId);

    /*var_dump($eventId);
    //altijd ( standaard url)
    $allEvent = isset($_REQUEST['allEvent'])? $_REQUEST['allEvent'] : null;
    $eventController->handleFindAllEvents();*/

    //?personId=1
   // $personId = isset($_REQUEST['personId']) ? $_REQUEST['personId'] : null;
  //  $personController->handleFindPersonById($personId);


    //2datums
    //?from=..&until=
   // var_dump($_REQUEST);

   /* //?startDate=2017/03/28&endDate=2017/03/30
    $startDate = isset($_REQUEST['startDate']) ? $_REQUEST['startDate'] : null;
    $endDate = isset($_REQUEST['endDate']) ? $_REQUEST['endDate'] : null;

    echo($startDate);
    echo($endDate);

    $eventController->handleEventBetweenTwoDates($startDate, $endDate);*/



    //insert een event
   // ?eventName=hey&startDate=2017/03/28&endDate=2017/03/30&location=whutwhut&personId=1
    $eventName = isset($_REQUEST['eventName']) ? $_REQUEST['eventName'] : null;
    $startDate = isset($_REQUEST['startDate']) ? $_REQUEST['startDate'] : null;
    $endDate = isset($_REQUEST['endDate']) ? $_REQUEST['endDate'] : null;
    $location = isset($_REQUEST['location']) ? $_REQUEST['location'] : null;
    $personId = isset($_REQUEST['personId']) ? $_REQUEST['personId'] : null;

    $event = new \model\Event();
    $event->setName($eventName);
    $event->setStartDate($startDate);
    $event->setEndDate($endDate);
    $event->setLocation($location);
    $event->setPersonId($personId);

    $eventController->handleEventAdd($event);

} catch (Exception $e) {
    echo $e;
}

