<?php

namespace Its\Example\Dashboard\Core\Application\Service\FriendList;

use Its\Example\Dashboard\Core\Domain\Repository\FriendsRepository;

class FriendListService
{
    protected $friendsRepository;

    public function __construct(FriendsRepository $friendsRepository)
    {
        $this->friendsRepository = $friendsRepository;
    }

    public function execute($username)
    {
        return $this->friendsRepository->findByUsername($username);
    }
}