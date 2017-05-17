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
    private $eventRepository;
    private $view;

    public function __construct(EventRepository $eventRepository, View $view)
    {
        $this->eventRepository = $eventRepository;
        $this->view = $view;
    }

    public function handleFindEventById($id = null)
    {
        $event = $this->eventRepository->findEventById($id);
        $this->view->show(['event' => $event]);
    }
    public function handleFindEventByName($name = null)
    {
        $event = $this->eventRepository->findEventByName($name);
        $this->view->show(['event' => $event]);
    }
    public function handleFindAllEvents()
    {
        $event = $this->eventRepository->findAllEvents();
        $this->view->showAll(['event' => $event]);
    }
    public function handleEventBetweenTwoDates($startDate = null, $endDate = null)
    {
        $event = $this->eventRepository->findBetweenTwoDates($startDate, $endDate);
        $this->view->showAll(['event' => $event]);
    }
    /*
    public function handelAddEvent($name = null)
    {
        $event = $this->eventRepository->findEventByName($name);
        $this->view->show(['event' => $event]);
    }
    public function handeRemoveEvent($name = null)
    {
        $event = $this->eventRepository->findEventByName($name);
        $this->view->show(['event' => $event]);
    }*/
//$event = $this->eventRepository->findEventByName($name);
}
