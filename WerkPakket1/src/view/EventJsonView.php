<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 29/03/2017
 * Time: 16:10
 */

namespace view;


class EventJsonView implements View
{

    public function show(array $data)
    {
        // TODO: Implement show() method.

        header('Content-Type: application/json');

        if (isset($data['event'])) {
            $event = $data['event'];
            echo json_encode(['id' => $event->getId(), 'name' => $event->getName()
                , 'startDate' => $event->getStartDate(), 'endDate' => $event->getEndDate()
                , 'location' => $event->getLocation()]
                ,JSON_PRETTY_PRINT );
        } else {
            echo '{}';
        }
    }


    public function showAll(array $data)
    {
        // TODO: Implement show() method.

        header('Content-Type: application/json');

        if (isset($data['event'])) {
            $event = $data['event'];
            $listJson = array();
            $i =0;
            foreach ($event as $e)
            {
                $listJson[$i] =  ['id' => $e->getId(), 'name' => $e->getName()
                    , 'startDate' => $e->getStartDate(), 'endDate' => $e->getEndDate(), 'location' => $e->getLocation()];
                $i++;
            }

            echo json_encode($listJson,JSON_PRETTY_PRINT) ;


        } else {
            echo '{}';
        }
    }
}