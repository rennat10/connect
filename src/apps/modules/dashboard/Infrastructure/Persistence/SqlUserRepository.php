<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence;

use Its\Example\Dashboard\Core\Domain\Model\Users;
use Its\Example\Dashboard\Core\Domain\Repository\UserRepository;

class SqlUserRepository implements UserRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findByUsername($username) : Users
    {
        $sql = "SELECT * FROM Users WHERE username = :username";

        $result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'username' => $username
        ]);

        $user = new Users(
            $result['nama'],
            $result['username'],
            $result['password'],
            $result['foto'],
            $result['tanggal_lahir']
        );

        return $user;
    }

    public function save($nama, $username, $password, $foto, $tanggal_lahir)
    {
        $sql = "INSERT INTO Users(nama, username, password, foto, tanggal_lahir) VALUES(:nama, :username, :password, :foto, :tanggal_lahir)";

        $this->db->query($sql, [
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'foto' => $foto,
            'tanggal_lahir' => $tanggal_lahir
        ]);
    }

    public function update($nama, $username, $foto, $tanggal_lahir)
    {
        $sql = "UPDATE Users
                SET nama = :nama, foto = :foto, tanggal_lahir = :tanggal_lahir
                WHERE username = :username";

        $this->db->query($sql, [
            'nama' => $nama,
            'foto' => $foto,
            'tanggal_lahir' => $tanggal_lahir,
            'username' => $username
        ]);
    }

    public function all() : array
    {
        $sql = "SELECT * FROM Users";

        $result = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC);

        $resultArray = array();
        foreach($result as $row)
        {
            $user = new Users(
                $row['nama'],
                $row['username'],
                $row['password'],
                $row['foto'],
                $row['tanggal_lahir']
            );

            array_push($resultArray, $user);
        }
        
        return $resultArray;
    }
}