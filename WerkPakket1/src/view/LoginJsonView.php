<?php
/**
 * Created by PhpStorm.
 * User: 11401671
 * Date: 23/05/2017
 * Time: 12:42
 */
namespace view;


class LoginJsonView implements View
{

    public function show(array $data)
    {
        // TODO: Implement show() method.

        header('Content-Type: application/json');

        if (isset($data['login'])) {
            $login = $data['login'];
            echo json_encode(['id' => $login->getId(), 'name' => $login->getUserName()
                    , 'password' => $login->getPassword(),]
                ,JSON_PRETTY_PRINT );
        } else {
            echo '{}';
        }
    }

    public function showAll(array $data)
    {
        // TODO: Implement showAll() method.
    }
}