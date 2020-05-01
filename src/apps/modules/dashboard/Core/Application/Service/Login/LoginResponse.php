<?php

namespace Its\Example\Dashboard\Core\Application\Service\Login;

class LoginResponse
{
    protected $message;
    protected $data;
    protected $error;

    public function __construct($message = NULL, $data = NULL, $error = NULL)
    {
        $this->message = $message;
        $this->data = $data;
        $this->error = $error;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getError()
    {
        return $this->error;
    }
}