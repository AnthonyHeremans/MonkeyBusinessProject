<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 12:45
 */

namespace controller;


use model\LoginRepository;
use model\EventRepository;
use view\View;
class LoginController
{

    private $LoginRepository;
    private $view;

    public function __construct(LoginRepository $LoginRepository, View $view)
    {
        $this->$LoginRepository = $LoginRepository;
        $this->view = $view;
    }
    public function handleFindLoginByUsername($name = null)
    {
        $login = $this->LoginRepository->findloginByName($name);
        $this->view->show(['login' => $login]);
    }
}