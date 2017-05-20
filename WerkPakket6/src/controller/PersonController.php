<?php

/**
 * Created by PhpStorm.
 * User: greg
 * Date: 29/03/2017
 * Time: 16:15
 */
namespace controller;
use model\PersonRepository;
use view\View;

class PersonController
{
    private $personRepository;
    private $view;

    public function __construct(PersonRepository $personRepository, View $view)
    {
        $this->personRepository = $personRepository;
        $this->view = $view;
    }

    public function handleFindPersonById($id = null)
    {
        $person = $this->personRepository->findPersonById($id);
        $this->view->show(['person' => $person]);
    }
    public function handleJSONPersons() {
        $jsonPersons = fopen(__DIR__."/../../monkeybusiness_persons.json", "r") or die("Can't open persons JSON file.");
        $persons = json_decode(fread($jsonPersons, filesize("/var/www/html/var/www/html/monkeybusiness/WerkPakket6/monkeybusiness_persons.json")));
        $this->view->showAllJson(['person' => $persons]);
    }
}
