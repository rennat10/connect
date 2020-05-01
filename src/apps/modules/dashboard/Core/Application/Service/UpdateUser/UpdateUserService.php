<?php

namespace Its\Example\Dashboard\Core\Application\Service\UpdateUser;

use Its\Example\Dashboard\Core\Domain\Model\Users;
use Its\Example\Dashboard\Core\Domain\Repository\UserRepository;

class UpdateUserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UpdateUserRequest $request)
    {
        $nama = $request->getNama();
        $username = $request->getUsername();
        $foto = $request->getFoto();
        $tanggal_lahir = $request->getTanggalLahir();

        try {
            $this->userRepository->update($nama, $username, $foto, $tanggal_lahir);
            return new UpdateUserResponse('Update berhasil.');
        }
        catch(\Exception $e)
        {
            return new UpdateUserResponse($e->getMessage(), TRUE);
        }
    }
}