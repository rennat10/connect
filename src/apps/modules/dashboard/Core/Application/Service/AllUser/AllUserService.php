<?php

namespace Its\Example\Dashboard\Core\Application\Service\AllUser;

use Its\Example\Dashboard\Core\Domain\Repository\UserRepository;

class AllUserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute()
    {
        return $this->userRepository->all();
    }
}