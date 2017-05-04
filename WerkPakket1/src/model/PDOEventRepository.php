<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 29/03/2017
 * Time: 16:14
 */

namespace model;


class PDOEventRepository implements EventRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    public function findEventById($id)
    {
        // TODO: Implement findEventById() method.
        try{
            $statement = $this->connection->prepare('SELECT * FROM event WHERE event_id=?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Event($results[0]['event_id'], $results[0]['event_name']
                    , $results[0]['event_start_date'], $results[0]['event_end_date'], $results[0]['event_location']);
            } else {
                return null;
            }

             } catch (\Exception $exception) {
                return null;
                }
    }

    public function findEventByName($name)
    {

        // TODO: Implement findEventByName() method.
        try {
            $statement = $this->connection->prepare('SELECT * FROM event WHERE event_name=?');
            $statement->bindParam(1, $name, \PDO::PARAM_STR);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Event($results[0]['event_id'], $results[0]['event_name']
                    , $results[0]['event_start_date'], $results[0]['event_end_date'], $results[0]['event_location']);
            } else {
                return null;
            }

        }
        catch (\Exception $exception) {
            return null;
        }

    }

    public function findAllEvents()
    {
        // TODO: Implement findAllEvents() method.

        try {
            $statement = $this->connection->prepare('SELECT * FROM event');
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            $arrayEvents = array();

            if (count($results) > 0) {
                for ($x = 0; $x <= count($results) -1 ; $x++) {
                    $arrayEvents[$x] =  new Event($results[$x]['event_id'], $results[$x]['event_name']
                        , $results[$x]['event_start_date'], $results[$x]['event_end_date'], $results[$x]['event_location']);
                }
                return $arrayEvents;
            } else {
                return null;
            }

        }
        catch (\Exception $exception) {
            return null;
        }
    }

    public function findBetweenTwoDates($startDate, $endDate)
    {
        // TODO: Implement findBetweenTwoDates() method.

    }

    public function addEvent(Event $event)
    {
        // TODO: Implement addEvent() method.
    }

    public function removeOnId($id)
    {
        // TODO: Implement removeOnId() method.
    }
}