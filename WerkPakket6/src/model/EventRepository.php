<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 29/03/2017
 * Time: 16:01
 */

namespace model;


interface EventRepository
{

    public function findEventById($id);
    public function findEventByName($name);
    public function findAllEvents();
    public function findBetweenTwoDates($startDate, $endDate);
    public function addEvent(Event $event);
    public function removeOnId($id);
}