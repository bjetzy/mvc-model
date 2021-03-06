<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\View\View;

/**
 * Siehe Dokumentation im DefaultController.
 */
class UserController
{
    public function index()
    {
        $userRepository = new UserRepository();

        $view = new View('user/index');
        $view->title = 'Benutzer';
        $view->heading = 'Benutzer';
        $view->noHeader = true;
        $view->users = $userRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $view = new View('user/create');
        $view->title = 'Benutzer erstellen';
        $view->heading = 'Benutzer erstellen';
        $view->display();
    }

    public function login()
    {

        $view = new View('user/login');
        $view->title = 'Login';
        $view->heading = 'Login';
        $view->noHeader = true;
        $view->noFooter = true;
        $view->display();
    }

    public function doCreate()
    {
        if (isset($_POST['send'])) {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userRepository = new UserRepository();
            $userRepository->create($firstName, $lastName, $email, $password);
        }

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function delete()
    {
        // $userRepository = new UserRepository();
        // $userRepository->deleteById($_GET['id']);

        // Anfrage an die URI /user weiterleiten (HTTP 302)
        header('Location: /user');
    }

    public function checkLogin(){
      if (isset($_POST['username'])
      && !empty($_POST['username'])
      && isset($_POST['password'])
      && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $isValid = false;

          $userRepository = new UserRepository();
          if($userRepository->isValidUser($username,$password)){
            header('Location: /blog');
          }
          else {
            header('Location: /error');
          }


      }
    }
}
