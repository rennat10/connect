<?php

namespace Its\Example\Dashboard\Core\Application\Service\AddUser;

use Its\Example\Dashboard\Core\Domain\Model\Users;
use Its\Example\Dashboard\Core\Domain\Repository\UserRepository;

class AddUserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(AddUserRequest $request)
    {
        $nama = $request->getNama();
        $username = $request->getUsername();
        $password = $request->getPassword();
        $foto = $request->getFoto();
        $tanggal_lahir = $request->getTanggalLahir();

        try {
            $this->userRepository->save($nama, $username, $password, $foto, $tanggal_lahir);
            return new AddUserResponse('User berhasil ditambahkan.');
        }
        catch(\Exception $e)
        {
            return new AddUserResponse($e->getMessage(), TRUE);
        }
    }
}