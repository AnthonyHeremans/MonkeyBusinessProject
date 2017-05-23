<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 12:48
 */

namespace model;


interface LoginRepository
{
    public function findloginByName($name);
}