<?php

namespace Its\Example\Dashboard\Core\Application\Service\FindUserByUsername;

use Its\Example\Dashboard\Core\Domain\Model\Users;
use Its\Example\Dashboard\Core\Domain\Repository\UserRepository;

class FindUserByUsernameService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($username)
    {
        $user = $this->userRepository->findByUsername($username);
        return $user;
    }
}