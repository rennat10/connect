<?php

namespace Its\Example\Dashboard\Core\Domain\Model;

class Comment
{
    protected $idc;
    protected $id;
    protected $username;
    protected $comment;
    protected $foto;
    protected $waktu;

    public function __construct($idc, $id, $username, $comment, $foto, $waktu)
    {
        $this->idc = $idc;
        $this->id = $id;
        $this->username = $username;
        $this->comment = $comment;
        $this->foto = $foto;
        $this->waktu = $waktu;
    }

    public function getIdc()
    {
        return $this->idc;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function getWaktu()
    {
        return $this->waktu;
    }
}