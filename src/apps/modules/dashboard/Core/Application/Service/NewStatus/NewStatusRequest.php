<?php

namespace Its\Example\Dashboard\Core\Application\Service\NewStatus;

class NewStatusRequest
{
    protected $username;
    protected $isi;
    protected $waktu;
    protected $foto;
    protected $likesCnt;

    public function __construct($username, $isi, $waktu, $foto, $likesCnt)
    {
        $this->username = $username;
        $this->isi = $isi;
        $this->waktu = $waktu;
        $this->foto = $foto;
        $this->likesCnt = $likesCnt;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getIsi()
    {
        return $this->isi;
    }

    public function getWaktu()
    {
        return $this->waktu;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getLikesCnt()
    {
        return $this->likesCnt;
    }
}