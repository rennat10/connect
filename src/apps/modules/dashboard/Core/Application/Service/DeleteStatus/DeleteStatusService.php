<?php

namespace Its\Example\Dashboard\Core\Application\Service\DeleteStatus;

use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;
use Its\Example\Dashboard\Core\Domain\Model\Comment;
use Its\Example\Dashboard\Core\Domain\Repository\CommentRepository;

class DeleteStatusService
{
    protected $statusUserRepository;
    protected $commentRepository;

    public function __construct(StatusUserRepository $statusUserRepository, CommentRepository $commentRepository)
    {
        $this->statusUserRepository = $statusUserRepository;
        $this->commentRepository = $commentRepository;
    }

    public function execute($id)
    {
        $this->commentRepository->deleteByStatus($id);
        $this->statusUserRepository->delete($id);
    }
}