<?php

namespace Its\Example\Dashboard\Core\Application\Service\UpdateUser;

class UpdateUserResponse
{
    protected $message;
    protected $error;

    public function __construct($message = NULL, $error = NULL)
    {
        $this->message = $message;
        $this->error = $error;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getError()
    {
        return $this->error;
    }
}