<?php

namespace Its\Example\Dashboard\Core\Application\Service\UpdateStatus;

use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;

class UpdateStatusService
{
    protected $statusUserRepository;

    public function __construct(StatusUserRepository $statusUserRepository)
    {
        $this->statusUserRepository = $statusUserRepository;
    }

    public function execute(UpdateStatusRequest $request)
    {
        $id = $request->getId();
        $isi = $request->getIsi();
        $waktu = $request->getWaktu();

        $this->statusUserRepository->updateIsi($id, $isi, $waktu);
    }
}