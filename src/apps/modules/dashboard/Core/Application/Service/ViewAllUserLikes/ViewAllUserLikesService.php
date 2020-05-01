<?php

namespace Its\Example\Dashboard\Core\Application\Service\ViewAllUserLikes;

use Its\Example\Dashboard\Core\Domain\Model\Likes;
use Its\Example\Dashboard\Core\Domain\Repository\LikesRepository;

class ViewAllUserLikesService
{
    protected $likesRepository;

    public function __construct(LikesRepository $likesRepository)
    {
        $this->likesRepository = $likesRepository;
    }

    public function execute($id)
    {
        return $this->likesRepository->userLikes($id);
    }
}