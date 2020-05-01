<?php

namespace Its\Example\Dashboard\Core\Application\Service\RemoveFriend;

use Its\Example\Dashboard\Core\Domain\Model\Friends;
use Its\Example\Dashboard\Core\Domain\Repository\FriendsRepository;

class RemoveFriendService
{
    protected $friendsRepository;

    public function __construct(FriendsRepository $friendsRepository)
    {
        $this->friendsRepository = $friendsRepository;
    }

    public function execute(RemoveFriendRequest $request)
    {
        $username = $request->getUsername();
        $usernameTeman = $request->getUsernameTeman();

        $this->friendsRepository->removeFriend($username, $usernameTeman);
    }
}