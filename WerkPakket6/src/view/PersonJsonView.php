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

    public function showAll(array $data)
    {
        // TODO: Implement showAll() method.
    }

    public function showAllJson(array $data)
    {
        header('Content-Type: application/json');

        if (isset($data['person'])) {
            $person = $data['person'];
            $listJson = array();
            $i = 0;
            foreach ($person as $p) {
                $listJson[$i] = ['id' => $p->person_id, 'firstName' => $p->person_firstname, 'lastName' => $p->person_lastname,
                    'events' => $p->person_events];
                $i++;
            }

            echo "The following is decoded from the persons json file:";
            echo json_encode($listJson, JSON_PRETTY_PRINT);


        } else {
            echo '{}';
        }
    }
}