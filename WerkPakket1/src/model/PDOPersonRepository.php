<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 29/03/2017
 * Time: 16:11
 */

namespace model;


class PDOPersonRepository implements PersonRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findPersonById($id )
    {
        try {
            $statement = $this->connection->prepare('SELECT * FROM person WHERE person_id=?');
            $statement->bindParam(1, $id, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Person($results[0]['id'], $results[0]['firstname'], $results[0]['lastname'], $results[0]['event']);
            } else {
                return null;
            }
        } catch (\Exception $exception) {
            return null;
        }
    }
<<<<<<< HEAD


    public function findPersonByFirstName($firstname)
    {
        // TODO: Implement findPersonByFirstName() method.
    }

    public function findPersonByLastName($lastname)
    {
        // TODO: Implement findPersonByLastName() method.
    }

    public function addPerson(Person $person)
    {
        // TODO: Implement addPerson() method.
    }

    public function findAllPersons()
    {
        // TODO: Implement findAllPersons() method.
    }

    public function removeOnID($id)
    {
        // TODO: Implement removeOnID() method.
    }
=======
}
>>>>>>> parent of 267049d... sync
}