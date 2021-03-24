<?php


namespace App\Controller;


use Authentication\Controller\Component\AuthenticationComponent;

/**
 * @property AuthenticationComponent Authentication
 */
class UsersController extends AppController
{
    public function initialize():void
    {
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['login','signin']);
    }

    public function login()
    {

        //https://cakephp.test/

        $user = $this->Users->newEmptyEntity();

        $result = $this->Authentication->getResult();
        if($result->isValid())
        {
            $target = $this->Authentication->getLoginRedirect() ?? '/';
            return $this->redirect($target);
        }

        if($this->getRequest()->is('Post') && !$result->isValid())
        {
            $this->Flash->error('Mot de passe non valide');
        }



        $this->set(compact('user'));
    }

    public function signin()
    {
        $user = ['email' => 'test@gmail.com','password' => '1234'];

        $userEntity = $this->Users->newEntity($user);

        $this->Users->save($userEntity);

        die('ok');
    }



}
