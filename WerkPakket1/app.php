<?php


// dit moet allemaal in de git ignore
require_once 'vendor/autoload.php';
use \model\PDOEventRepository;
use \view\EventJsonView;
use \controller\EventController;

$user = 'root';
$password = 'root';
$database = 'monkeybusiness_WP1';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database",
                   $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);

    $eventPDORepository = new PDOEventRepository($pdo);
    $eventJsonView = new EventJsonView();
    $eventController = new EventController($eventPDORepository, $eventJsonView);


    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $eventController->handleFindEventById($id);
    


} catch (Exception $e) {
    echo $e;
}

