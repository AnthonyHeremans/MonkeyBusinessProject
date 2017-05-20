<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 29/03/2017
 * Time: 16:10
 */

namespace model;


interface PersonRepository
{
    public function findPersonByID($id);
    public function findPersonByFirstName($firstname);
    public function findPersonByLastName($lastname);
    public function addPerson(Person $person);
    public function findAllPersons();
    public function removeOnID($id);
}