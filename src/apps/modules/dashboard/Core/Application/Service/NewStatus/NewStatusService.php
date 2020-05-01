<?php

namespace Its\Example\Dashboard\Core\Application\Service\NewStatus;

use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;

class NewStatusService
{
    protected $statusUserRepository;

    public function __construct(StatusUserRepository $statusUserRepository)
    {
        $this->statusUserRepository = $statusUserRepository;
    }

    public function execute(NewStatusRequest $request)
    {
        $username = $request->getUsername();
        $isi = $request->getIsi();
        $waktu = $request->getWaktu();
        $foto = $request->getFoto();
        $likesCnt = $request->getLikesCnt();

        try {
            $this->statusUserRepository->save($username, $isi, $waktu, $foto, $likesCnt);
            return new NewStatusResponse('Status berhasil dibuat.');
        }
        catch(\Exception $e) {
            return new NewStatusResponse($e->getMessage(), TRUE);
        }
    }
}