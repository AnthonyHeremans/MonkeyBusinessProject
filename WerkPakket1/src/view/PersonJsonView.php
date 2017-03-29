<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 29/03/2017
 * Time: 16:22
 */

namespace view;


class PersonJsonView implements View
{
    public function show(array $data)
    {
        header('Content-Type: application/json');

        if (isset($data['person'])) {
            $person = $data['person'];
            echo json_encode(['id' => $person->getId(), 'firstname' => $person->getFirstname(), 'lastname' => $person->getLastname()]);
        } else {
            echo '{}';
        }
    }
}