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


    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }


}