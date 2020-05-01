<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence;

use Its\Example\Dashboard\Core\Domain\Model\Comment;
use Its\Example\Dashboard\Core\Domain\Model\StatusUser;

use Its\Example\Dashboard\Core\Domain\Repository\CommentRepository;

class SqlCommentRepository implements CommentRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function makeComment($id, $username, $comment, $foto, $waktu)
    {
        $sql = "INSERT INTO Comment(id, username, comment, foto, waktu) VALUES(:id, :username, :comment, :foto, :waktu)";

        $this->db->query($sql, [
            'id' => $id,
            'username' => $username,
            'comment' => $comment,
            'foto' => $foto,
            'waktu' => $waktu
        ]);
    }

    public function findByUsername($username) : array
    {
        $sql = "SELECT Comment.*
                FROM Comment
                INNER JOIN StatusUser
                ON Comment.id = StatusUser.id
                WHERE StatusUser.username = :username";

        $result = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'username' => $username
        ]);

        $resultArray = array();

        foreach($result as $row)
        {
            $comment = new Comment(
                $row['idc'],
                $row['id'],
                $row['username'],
                $row['comment'],
                $row['foto'],
                $row['waktu']
            );

            array_push($resultArray, $comment);
        }

        $sql = "SELECT Comment.*
                FROM ((Comment
                INNER JOIN StatusUser ON StatusUser.id = Comment.id) 
                INNER JOIN Friends ON StatusUser.username = Friends.usernameTeman)
                WHERE Friends.username = :username";

        $result = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'username' => $username
        ]);
        
        foreach($result as $row)
        {
            $comment = new Comment(
                $row['idc'],
                $row['id'],
                $row['username'],
                $row['comment'],
                $row['foto'],
                $row['waktu']
            );

            array_push($resultArray, $comment);
        }

        return $resultArray;
    }

    public function deleteByStatus($id)
    {
        $sql = "DELETE FROM Comment WHERE id = :id";

        $this->db->query($sql, [
            'id' => $id
        ]);
    }
}