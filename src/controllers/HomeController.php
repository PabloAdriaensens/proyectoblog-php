<?php

namespace App\controllers;

use App\models\entities\Post;
use App\services\PostsService;
use Kint;
class HomeController extends ControllerAuth
{

    public function index()
    {
        $PostsService = $this->container->get(PostsService::class);
        $posts = $PostsService->getPosts();
        Kint::dump($this->user);
        $this->viewManager->renderTemplate("index.view.html", ['posts' => $posts, 'user' => (!$this->user)?null:$this->user->email]);
    }
}
