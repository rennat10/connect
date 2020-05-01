<?php

namespace Its\Example\Dashboard\Core\Application\Service\NewComment;

use Its\Example\Dashboard\Core\Domain\Model\Comment;
use Its\Example\Dashboard\Core\Domain\Repository\CommentRepository;

class NewCommentService
{
    protected $commentRepository;

    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function execute(NewCommentRequest $request)
    {
        $id = $request->getId();
        $username = $request->getUsername();
        $comment = $request->getComment();
        $foto = $request->getFoto();
        $waktu = $request->getWaktu();

        try {
            $this->commentRepository->makeComment($id, $username, $comment, $foto, $waktu);
            return new NewCommentResponse('Comment berhasil dibuat.');
        }
        catch(\Exception $e)
        {
            return new NewCommentResponse($e->getMessage(), TRUE);
        }
    }
}