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
                    , $results[0]['event_start_date'], $results[0]['event_end_date'], $results[0]['event_location'], $results[0]['PersonId']);
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
                    , $results[0]['event_start_date'], $results[0]['event_end_date'], $results[0]['event_location'], $results[0]['PersonId']);
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
                        , $results[$x]['event_start_date'], $results[$x]['event_end_date'], $results[$x]['event_location'], $results[0]['PersonId']);
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
        try {

            $arrayEvents = array();
            $statement = $this->connection->prepare("SELECT * FROM event WHERE event_start_date BETWEEN ? AND ? ");
            $statement->bindParam(1, $startDate, \PDO::PARAM_STR);
            $statement->bindParam(2, $endDate, \PDO::PARAM_STR);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);
//echo(count($results));


            if (count($results) > 0) {
                for ($x = 0; $x <= count($results) -1 ; $x++) {
                    $arrayEvents[$x] =  new Event($results[$x]['event_id'], $results[$x]['event_name']
                        , $results[$x]['event_start_date'], $results[$x]['event_end_date'], $results[$x]['event_location'], $results[$x]['PersonId']);
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

    public function addEvent(Event $event)
    {
        try {
            $statement = $this->connection->prepare('INSERT INTO event (event_name, event_start_date, event_end_date,event_location, PersonId) VALUES (?, ?, ?, ?, ?)');

            // zwaar bealo da ik dit zo meot doen
            $name = $event->getName();
            $start = $event->getStartDate();
            $end = $event->getEndDate();
            $location = $event->getLocation();
            $personid = $event->getPersonId();

            if ($name != null || $start != null || $end != null || $location != null || $personid != null) {
                $statement->bindParam(1, $name, \PDO::PARAM_STR);
                $statement->bindParam(2, $start, \PDO::PARAM_STR);
                $statement->bindParam(3, $end, \PDO::PARAM_STR);
                $statement->bindParam(4, $location, \PDO::PARAM_STR);
                $statement->bindParam(5, $personid, \PDO::PARAM_STR);
                $statement->execute();

            }else{ echo "niet eringezet"; }
           // $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            /*$arrayEvents = array();

            if (count($results) > 0) {
                for ($x = 0; $x <= count($results) -1 ; $x++) {
                    $arrayEvents[$x] =  new Event($results[$x]['event_id'], $results[$x]['event_name']
                        , $results[$x]['event_start_date'], $results[$x]['event_end_date'], $results[$x]['event_location']
                        , $results[0]['PersonId']);
                }
                return $arrayEvents;
            } else {
                return null;
            }*/

        }
        catch (\Exception $exception) {
            return null;
        }
    }

    public function removeOnId($id)
    {
        // TODO: Implement removeOnId() method.
    }

    public function editEvent(Event $event)
    {
        // TODO: Implement editEvent() method.
    }
}