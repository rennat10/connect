<?php

namespace Its\Example\Dashboard\Core\Application\Service\UpdateUser;

class UpdateUserRequest
{
    protected $nama;
    protected $username;
    protected $foto;
    protected $tanggal_lahir;

    public function __construct($nama, $username, $foto, $tanggal_lahir)
    {
        $this->nama = $nama;
        $this->username = $username;
        $this->foto = $foto;
        $this->tanggal_lahir = $tanggal_lahir;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getTanggalLahir()
    {
        return $this->tanggal_lahir;
    }
}