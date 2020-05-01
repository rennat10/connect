<?php

namespace Its\Example\Dashboard\Core\Domain\Model;

class StatusUser
{
    protected $id;
    protected $isi;
    protected $waktu;
    protected $username;
    protected $foto;
    protected $likesCnt;

    public function __construct($id, $isi, $waktu, $username, $foto, $likesCnt)
    {
        $this->id = $id;
        $this->isi = $isi;
        $this->waktu = $waktu;
        $this->username = $username;
        $this->foto = $foto;
        $this->likesCnt = $likesCnt;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIsi()
    {
        return $this->isi;
    }

    public function getWaktu()
    {
        return $this->waktu;
    }

    public function getUsername()
    {
        return $this->username;
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