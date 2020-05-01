<?php

namespace Its\Example\Dashboard\Core\Application\Service\UpdateStatus;

class UpdateStatusRequest
{
    protected $id;
    protected $isi;
    protected $waktu;

    public function __construct($id, $isi, $waktu)
    {
        $this->id = $id;
        $this->isi = $isi;
        $this->waktu = $waktu;
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
}