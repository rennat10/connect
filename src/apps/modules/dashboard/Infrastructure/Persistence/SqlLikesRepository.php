<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence;

use Its\Example\Dashboard\Core\Domain\Model\Likes;
use Its\Example\Dashboard\Core\Domain\Repository\LikesRepository;

class SqlLikesRepository implements LikesRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function likesStatus($id, $username)
    {
        $sql = "INSERT INTO Likes(id, username) VALUES (:id, :username)";

        $this->db->query($sql, [
            'id' => $id,
            'username' => $username
        ]);
    }

    public function unlikesStatus($id, $username)
    {
        $sql = "DELETE FROM Likes WHERE id = :id and username = :username";

        $this->db->query($sql, [
            'id' => $id,
            'username' => $username
        ]);
    }

    public function findByUsername($username) : Array
    {
        $sql = "SELECT * FROM Likes WHERE username = :username";

        $result = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'username' => $username
        ]);

        $resultArray = array();
        foreach($result as $row)
        {
            $likes = new Likes($row['id'], $row['username']);

            array_push($resultArray, $likes);
        }

        return $resultArray;
    }

    public function userLikes($id) : array
    {
        $sql = "SELECT * FROM Likes WHERE id = :id";

        $result = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'id' => $id
        ]);

        $resultArray = array();
        foreach($result as $row)
        {
            $likes = new Likes($row['id'], $row['username']);

            array_push($resultArray, $likes);
        }

        return $resultArray;
    }
}