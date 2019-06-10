<?php

namespace App\controllers;

use App\models\entities\Post;
use App\services\PostsService;
use Kint\Kint;

class HomeController extends Controller
{

    public function index()
    {
        $PostsService = $this->container->get(PostsService::class);
        $posts = $PostsService->getPosts();
        $this->viewManager->renderTemplate("index.view.html", ['posts' => $posts]);
    }
}
