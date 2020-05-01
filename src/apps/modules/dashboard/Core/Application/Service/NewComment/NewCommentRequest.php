<?php

namespace Its\Example\Dashboard\Core\Application\Service\NewComment;

class NewCommentRequest
{
    protected $id;
    protected $username;
    protected $comment;
    protected $foto;
    protected $waktu;

    public function __construct($id, $username, $comment, $foto, $waktu) 
    {
        $this->id = $id;
        $this->username = $username;
        $this->comment = $comment;
        $this->foto = $foto;
        $this->waktu = $waktu;
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