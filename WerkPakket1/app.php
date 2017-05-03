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
   $eventName = isset($_GET['eventName']) ? $_GET['eventName'] : null;
    $eventController->handleFindEventByName($eventName);

    //?eventId=1
    $eventId = isset($_GET['eventId']) ? $_GET['eventId'] : null;
    $eventController->handleFindEventById($eventId);

    //altijd ( standaard url)
    $allEvent = isset($_GET['allEvent'])? $_GET['allEvent'] : null;
    $eventController->handleFindAllEvents();

    //?personId=1
    $personId = isset($_GET['personId']) ? $_GET['personId'] : null;
    $personController->handleFindPersonById($personId);

    //2datums




    


} catch (Exception $e) {
    echo $e;
}

