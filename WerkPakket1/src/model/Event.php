<?php

/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 29/03/2017
 * Time: 15:46
 */

namespace model;
class Event
{

    private $id;
    private $name;
    private $date;
    private $location;

    function __construct($id, $name, $date, $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->location = $location;

    }

}