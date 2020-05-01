<?php

namespace Its\Example\Dashboard\Core\Application\Service\StatusDetail;

use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;

class StatusDetailService
{
    protected $statusUserRepository;

    public function __construct(StatusUserRepository $statusUserRepository)
    {
        $this->statusUserRepository = $statusUserRepository;
    }

    public function execute($id)
    {
        return $this->statusUserRepository->findById($id);
    }
}