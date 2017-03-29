<?php

/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 29/03/2017
 * Time: 16:14
 */
namespace controller;

use model\Event;
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
// by id
    public function handleFindEventById($id = null)
    {
        $event = $this->eventRepository->findEventById($id);
        $this->view->show(['event' => $event]);
    }
    //by name
    public function handleFindEventByName($name = null)
    {
        $event = $this->eventRepository->findEventByName($name);
        $this->view->show(['event' => $event]);
    }
    // all
    public function handleFindAllEvents()
    {
        $event = $this->eventRepository->findAllEvents();
        $this->view->show(['event' => $event]);
    }
    //add
    public function handelAddEvent(Event $event)
    {
        $event = $this->eventRepository->addEvent($event);
        $this->view->show(['event' => $event]);
    }
   // remove on id
    public function handeRemoveEvent($id = null)
    {
        $event = $this->eventRepository->removeOnId($id);
        $this->view->show(['event' => $event]);
    }
//$event = $this->eventRepository->findEventByName($name);
}