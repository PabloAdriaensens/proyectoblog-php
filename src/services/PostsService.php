<?php

namespace App\services;

use Kint\Kint;
use App\DoctrineManager;
use App\models\entities\Post;

class PostsService
{
    private $doctrine;

    public function __construct(DoctrineManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getPosts()
    {
        $repository = $this->doctrine->em->getRepository(Post::class);
        return $repository->findAll();
    }
}