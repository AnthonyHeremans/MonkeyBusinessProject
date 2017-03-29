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
}