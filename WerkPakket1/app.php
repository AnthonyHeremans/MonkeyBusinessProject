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





    //?name=eerste%20event
   $eventName = isset($_REQUEST['eventName']) ? $_REQUEST['eventName'] : null;
    $eventController->handleFindEventByName($eventName);

    //?eventId=1
    $eventId = isset($_REQUEST['eventId']) ? $_REQUEST['eventId'] : null;
    $eventController->handleFindEventById($eventId);

    //altijd ( standaard url)
    $allEvent = isset($_REQUEST['allEvent'])? $_REQUEST['allEvent'] : null;
    $eventController->handleFindAllEvents();

    //?personId=1
    $personId = isset($_REQUEST['personId']) ? $_REQUEST['personId'] : null;
    $personController->handleFindPersonById($personId);

    //('matthias is een mosnterrrr');
    //2datums
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;
    $eventController->handleEventBetweenTwoDates($startDate,$endDate);



    


} catch (Exception $e) {
    echo $e;
}

