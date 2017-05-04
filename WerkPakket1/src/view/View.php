<?php

/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 29/03/2017
 * Time: 16:08
 */

namespace view;

interface View
{
    public function show(array $data);
    public function showAll(array $data);
}