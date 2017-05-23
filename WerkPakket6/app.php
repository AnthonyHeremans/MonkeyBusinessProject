<?php


// dit moet allemaal in de git ignore
require_once 'vendor/autoload.php';
use \model\PDOEventRepository;
use \model\PDOPersonRepository;
use \view\EventJsonView;
use \controller\EventController;
use \controller\PersonController;

$configFile = fopen(__DIR__."/database_config.json", "r") or die("Can't open JSON config file.");
$config = json_decode(fread($configFile, filesize(__DIR__."/database_config.json")));


$user = $config->user;
$password = $config->password;
$database = $config->database;
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
    if ($eventName != null) {
        $eventController->handleFindEventByName($eventName);
    }


    //?eventId=1
    $eventId = isset($_REQUEST['eventId']) ? $_REQUEST['eventId'] : null;
    if ($eventId != null) {
        $eventController->handleFindEventById($eventId);
    }


    //altijd ( standaard url)
    $allEvent = isset($_REQUEST['allEvent']) ? $_REQUEST['allEvent'] : null;
    if (!isset($_REQUEST['json'])) {
        $eventController->handleFindAllEvents();
    }


    //?personId=1
    $personId = isset($_REQUEST['personId']) ? $_REQUEST['personId'] : null;
    if ($personId != null) {
        $personController->handleFindPersonById($personId);
    }


    //('matthias is een mosnterrrr');
    //2datums
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;
    if ($startDate != null && $endDate != null) {
        $eventController->handleEventBetweenTwoDates($startDate, $endDate);
    }


    //?json=1
    $json = isset($_REQUEST['json']) ? $_REQUEST['json'] : null;
    if ($json != null) {
        $eventController->handleJSONEvent();
        $personController->handleJSONPersons();
    }


} catch (Exception $e) {
    echo $e;
}

