<?php

namespace Its\Example\Dashboard\Core\Application\Service\UnlikeStatus;

use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Model\Likes;
use Its\Example\Dashboard\Core\Domain\Repository\LikesRepository;
use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;

class UnlikeStatusService
{
    protected $likesRepository;
    protected $statusUserRepository;

    public function __construct(LikesRepository $likesRepository, StatusUserRepository $statusUserRepository)
    {
        $this->likesRepository = $likesRepository;
        $this->statusUserRepository = $statusUserRepository;
    }

    public function execute(UnlikeStatusRequest $request)
    {
        $id = $request->getId();
        $username = $request->getUsername();
        $likesCnt = $request->getLikesCnt();

        try {
            $this->likesRepository->unlikesStatus($id, $username);
            $this->statusUserRepository->updateLikes($id, $likesCnt);
            return new UnlikeStatusResponse('Unlike status berhasil.');
        }
        catch (\Exception $e) {
            return new UnlikeStatusResponse($e->getMessage(), TRUE);
        }
    }
}