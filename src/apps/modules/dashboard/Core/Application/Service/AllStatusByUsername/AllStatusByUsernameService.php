<?php

namespace Its\Example\Dashboard\Core\Application\Service\AllStatusByUsername;

use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;

class AllStatusByUsernameService
{
    protected $statusUserRepository;

    public function __construct(StatusUserRepository $statusUserRepository)
    {
        $this->statusUserRepository = $statusUserRepository;
    }

    public function execute($username)
    {
        return $this->statusUserRepository->findByUsername($username);
    }
}