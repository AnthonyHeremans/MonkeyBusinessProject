<?php

/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 29/03/2017
 * Time: 16:14
 */
namespace controller;

use model\EventRepository;
use view\View;
class EventController
{

    public function __construct(PersonRepository $personRepository, View $view)
    {
        $this->personRepository = $personRepository;
        $this->view = $view;
    }

    private $personRepository;
    private $view;
}