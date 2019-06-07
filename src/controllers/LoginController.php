<?php

namespace App\controllers;

use App\DoctrineManager;
use Kint\Kint;
use App\models\entities\User;

class LoginController extends Controller
{
    private $error;

    public function index()
    {
        $this->error = null;
        $this->viewManager->renderTemplate('login.view.html', ['error' => $this->error]);
    }

    public function login(DoctrineManager $doctrine)
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repository = $doctrine->em->getRepository(User::class);
        $user = $repository->findOneByEmail($email);
        if (!$user) {
            $this->error = "El usuario no existe";
            return $this->viewManager->renderTemplate('login.view.html', ['error' => $this->error]);
        }
        if ($user->password !== sha1($password)) {
            $this->error = "El usuario o password es incorrecto";
            return $this->viewManager->renderTemplate('login.view.html', ['error' => $this->error]);
        }

        $this->sessionManager->put('user', $user->email);

        $this->redirectTo('dashboard');
    }
}
