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
    private $startDate;
    private $endDate;
    private $location;
    private $personId;

    /*function __construct( $id , $name, $startDate, $endDate, $location, $personId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->startDate = $startDate;
       $this->endDate = $endDate;
        $this->location = $location;
        $this->personId = $personId;

    }*/
    function __construct(){}
    /**
     * @return mixed
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param mixed $personId
     */
    public function setPersonId($personId)
    {
        $this->personId = $personId;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
   public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }



    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }





    public function getLocation()
    {
        return $this->location;
    }


    public function setLocation($location)
    {
        $this->location = $location;
    }


}