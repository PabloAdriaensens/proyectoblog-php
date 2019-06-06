<?php

namespace App\controllers;

use App\DoctrineManager;
use Kint\Kint;
use App\models\entities\User;

class RegisterController extends Controller
{
    public function index()
    {
        $this->viewManager->renderTemplate("register.view.html");
    }

    public function register(DoctrineManager $doctrine)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new \App\models\entities\User();
        $user->name = $name;
        $user->email = $email;
        $user->password = sha1($password);
        $doctrine->em->persist($user);
        $doctrine->em->flush();
    }
}
