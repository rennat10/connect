<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence;

use Its\Example\Dashboard\Core\Domain\Model\Friends;
use Its\Example\Dashboard\Core\Domain\Model\StatusUser;
use Its\Example\Dashboard\Core\Domain\Repository\StatusUserRepository;

class SqlStatusUserRepository implements StatusUserRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function save($username, $isi, $waktu, $foto, $likesCnt)
    {
        $sql = "INSERT INTO StatusUser(username, isi, waktu, foto, likesCnt) VALUES(:username, :isi, :waktu, :foto, :likesCnt)";

        $this->db->query($sql, [
            'username' => $username,
            'isi' => $isi,
            'waktu' => $waktu,
            'foto' => $foto,
            'likesCnt' => $likesCnt
        ]);
    }

    public function findById($id) : StatusUser
    {
        $sql = "SELECT * FROM StatusUser WHERE id = :id";

        $result = $this->db->fetchOne($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'id' => $id
        ]);

        $statususer = new StatusUser(
            $result['id'],
            $result['isi'],
            $result['waktu'],
            $result['username'],
            $result['foto'],
            $result['likesCnt']
        );

        return $statususer;
    }

    public function findByUsername($username) : array
    {
        $sql = "SELECT StatusUser.* FROM StatusUser
                INNER JOIN Friends
                ON StatusUser.username = Friends.usernameTeman
                WHERE Friends.username = :username";
        
        $result = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'username' => $username
        ]);

        $resultArray = array();
        foreach($result as $row)
        {
            $statususer = new StatusUser(
                $row['id'],
                $row['isi'],
                $row['waktu'],
                $row['username'],
                $row['foto'],
                $row['likesCnt']
            );

            array_push($resultArray, $statususer);
        }

        $sql = "SELECT * FROM StatusUser WHERE username = :username";

        $result = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'username' => $username
        ]);

        foreach($result as $row)
        {
            $statususer = new StatusUser(
                $row['id'],
                $row['isi'],
                $row['waktu'],
                $row['username'],
                $row['foto'],
                $row['likesCnt']
            );

            array_push($resultArray, $statususer);
        }

        return $resultArray;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM StatusUser WHERE id = :id";

        $this->db->query($sql, [
            'id' => $id
        ]);
    }

    public function updateLikes($id, $likesCnt)
    {
        $sql = "UPDATE StatusUser SET likesCnt = :likesCnt WHERE id = :id";

        $this->db->query($sql, [
            'likesCnt' => $likesCnt,
            'id' => $id
        ]);
    }

    public function updateIsi($id, $isi, $waktu)
    {
        $sql = "UPDATE StatusUser SET isi = :isi, waktu = :waktu WHERE id = :id";

        $this->db->query($sql, [
            'id' => $id,
            'isi' => $isi,
            'waktu' => $waktu
        ]);
    }
}