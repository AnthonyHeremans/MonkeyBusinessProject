<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 12:50
 */

namespace model;


class PDOLoginRepository implements LoginRepository
{
    private $connection = null;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findloginByName($name)
    {
        // TODO: Implement findEventById() method.
        try{
            $statement = $this->connection->prepare('SELECT * FROM Logins WHERE User_Name=?');
            $statement->bindParam(1, $name, \PDO::PARAM_INT);
            $statement->execute();
            $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

            if (count($results) > 0) {
                return new Event($results[0]['Login_id'], $results[0]['User_Name']
                    , $results[0]['Password']);
            } else {
                return null;
            }

        } catch (\Exception $exception) {
            return null;
        }
    }
}