<?php

namespace Its\Example\Dashboard\Core\Application\Service\ViewAllComment;

use Its\Example\Dashboard\Core\Domain\Model\Comment;
use Its\Example\Dashboard\Core\Domain\Repository\CommentRepository;

class ViewAllCommentService
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function execute($username)
    {
        return $this->commentRepository->findByUsername($username);
    }
}