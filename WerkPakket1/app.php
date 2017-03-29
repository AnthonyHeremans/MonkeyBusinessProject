<?php

// dit moet allemaal in de git ignore
require_once 'src/autoload.php';
/*use \model\PDOPersonRepository;
use \view\PersonJsonView;
use \controller\PersonController;
*//*
$user = 'root';
$password = '';
$database = 'persondatabase';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=localhost;dbname=$database",
                   $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
                       PDO::ERRMODE_EXCEPTION);

    $personPDORepository = new PDOPersonRepository($pdo);
    $personJsonView = new PersonJsonView();
    $personController = new PersonController($personPDORepository, $personJsonView);

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $personController->handleFindPersonById($id);
} catch (Exception $e) {
    echo 'cannot connect to database';
}
*/