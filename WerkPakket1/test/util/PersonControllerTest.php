<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 23:06
 */


use controller\PersonController;
use model\Person;
use model\PDOPersonRepository;


class PersonControllerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->mockPersonRepository = $this->getMockBuilder('model\PDOPersonRepository')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockView = $this->getMockBuilder('view\PersonJsonView')
            ->getMock();
    }

    public function tearDown()
    {
        $this->mockEventRepository = null;
        $this->mockView = null;
    }

    public function test_getPersonById_personExist_personAsJSON()
    {
        $person = new Person(rand(), 'firstanme', 'lastname',rand());
        $this->mockPersonRepository->expects($this->atLeastOnce())->method('findPersonByID')->will($this->returnValue($person));
        $personController = new PersonController($this->mockPersonRepository, $this->mockView);
        $personController->handleFindPersonById(rand());

    }
}
