<?php

namespace Its\Example\Dashboard\Core\Application\Service\AddFriend;

use Its\Example\Dashboard\Core\Domain\Model\Friends;
use Its\Example\Dashboard\Core\Domain\Repository\FriendsRepository;

class AddFriendService
{
    protected $friendsRepository;

    public function __construct(FriendsRepository $friendsRepository)
    {
        $this->friendsRepository = $friendsRepository;
    }

    public function execute(AddFriendRequest $request)
    {
        $username = $request->getUsername();
        $usernameTeman = $request->getUsernameTeman();

        $this->friendsRepository->addFriend($username, $usernameTeman);
    }
}