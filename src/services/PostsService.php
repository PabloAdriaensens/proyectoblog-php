<?php

namespace App\services;

use Kint\Kint;
use App\DoctrineManager;
use App\models\entities\Post;

class PostsService
{
    private $repository;

    public function __construct(DoctrineManager $doctrine)
    {
        $this->repository = $doctrine->em->getRepository(Post::class);
    }

    public function getPosts()
    {
        return $this->repository->findAll();
    }

    public function getPostsByIdUser(int $id)
    {
        return $this->repository->findById_User($id);
    }
}
