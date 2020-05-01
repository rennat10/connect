<?php

namespace Its\Example\Dashboard\Core\Application\Service\LikesStatus;

use Its\Example\Dashboard\Core\Domain\Model\Likes;
use Its\Example\Dashboard\Core\Domain\Repository\LikesRepository;
use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;

class LikesStatusService
{
    protected $likesRepository;
    protected $statusUserRepository;

    public function __construct(LikesRepository $likesRepository, StatusUserRepository $statusUserRepository)
    {
        $this->likesRepository = $likesRepository;
        $this->statusUserRepository = $statusUserRepository;
    }

    public function execute(LikesStatusRequest $request)
    {
        $id = $request->getId();
        $username = $request->getUsername();
        $likesCnt = $request->getLikesCnt();

        try {
            $this->likesRepository->likesStatus($id, $username);
            $this->statusUserRepository->updateLikes($id, $likesCnt);
            return new LikesStatusResponse('Likes berhasil dilakukan.');
        }
        catch(\Exception $e)
        {
            return new LikesStatusResponse($e->getMessage(), TRUE);
        }
    }
}