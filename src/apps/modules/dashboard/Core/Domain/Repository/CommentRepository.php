<?php

namespace Its\Example\Dashboard\Core\Domain\Repository;

interface CommentRepository
{
    public function makeComment($id, $username, $comment, $foto, $waktu);
    public function findByUsername($username) : array;
    public function deleteByStatus($id);
}