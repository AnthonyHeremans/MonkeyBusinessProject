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
                , 'date' => $event->getDate(), 'location' => $event->getLocation()]);
        } else {
            echo '{}';
        }
    }
}