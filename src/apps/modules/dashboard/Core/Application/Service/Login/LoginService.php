<?php

namespace Its\Example\Dashboard\Core\Application\Service\Login;

use Its\Example\Dashboard\Core\Domain\Model\Users;
use Its\Example\Dashboard\Core\Domain\Repository\UserRepository;

class LoginService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(LoginRequest $request)
    {
        $username = $request->getUsername();
        $password = $request->getPassword();

        try {
            $user = $this->userRepository->findByUsername($username);

            if($user->isExist())
            {
                if($user->getPassword() == $password)
                {
                    return new LoginResponse('Login berhasil.', $user);
                }
                
                return new LoginResponse('Password salah.', NULL, TRUE);
            }

            return new LoginResponse('User tidak ditemukan.', NULL, TRUE);
        }
        catch(\Exception $e)
        {
            return new LoginResponse($e->getMessage(), NULL, TRUE);
        }
    }
}