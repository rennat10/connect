<?php

namespace Its\Example\Dashboard\Core\Domain\Model;

class Users
{
    protected $nama;
    protected $username;
    protected $password;
    protected $foto;
    protected $tanggal_lahir;

    public function __construct($nama, $username, $password, $foto, $tanggal_lahir)
    {
        $this->nama = $nama;
        $this->username = $username;
        $this->password = $password;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getTanggalLahir()
    {
        return $this->tanggal_lahir;
    }

    public function isExist()
    {
        return isset($this->username);
    }
}