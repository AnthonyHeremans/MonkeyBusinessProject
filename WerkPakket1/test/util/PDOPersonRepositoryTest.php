<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 23:07
 */

use controller\PersonController;
use model\Person;
use model\PDOPersonRepository;


class PDOPersonRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function test_getPersonById_validId_personObject()
    {
        $person = new Person(rand(), 'NAME', 'FIRSTNAME', 'EVENT');
        $this->mockPDOStatement->expects($this->atLeastOnce())->method('bindParam');
        $this->mockPDOStatement->expects($this->atLeastOnce())->method('execute');
        $this->mockPDOStatement->expects($this->atLeastOnce())
            ->method('fetchAll')
            ->will($this->returnValue(
                [
                    [
                        'id' => $person->getId(),
                        'naam' => $person->getLastname(),
                        'voornaam' => $person->getFirstname(),
                        'event' => $person->getEvent()
                    ]
                ]));

        $this->mockPDO->expects($this->atLeastOnce())
            ->method('prepare')
            ->will($this->returnValue($this->mockPDOStatement));
        $pdoRepository = new PDOPersonRepository($this->mockPDO);
        $actualPerson = $pdoRepository->findPersonById($person->getId());

        $this->assertEquals($person, $actualPerson);
    }

}
