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


 /*   $router = new AltoRouter();
    $router->setBasePath('/api');

    $router->map('GET','/event/[i:id]',
        function($id) use (&$eventController) {
            $eventController->handleFindEventById($id);
        }
    );
    $match = $router->match();
    if( $match && is_callable( $match['target'] ) ){
        call_user_func_array( $match['target'], $match['params'] );
    }
*/
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $eventController->handleFindEventById($id);
    
// deze bolt niet
    $name = isset($_GET['name']) ? $_GET['name'] : null;
    $eventController->handleFindEventByName($name);
} catch (Exception $e) {
    echo $e;
}
