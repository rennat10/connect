<?php

namespace Its\Example\Dashboard\Core\Application\Service\FindLikesByUsername;

use Its\Example\Dashboard\Core\Domain\Model\Likes;
use Its\Example\Dashboard\Core\Domain\Repository\LikesRepository;

class FindLikesByUsernameService
{
    protected $likesRepository;

    public function __construct(LikesRepository $likesRepository)
    {
        $this->likesRepository = $likesRepository;
    }

    public function execute($username)
    {
        return $this->likesRepository->findByUsername($username);
    }
}