<?php

namespace Its\Example\Dashboard\Infrastructure\Persistence;

use Its\Example\Dashboard\Core\Domain\Model\Friends;
use Its\Example\Dashboard\Core\Domain\Repository\FriendsRepository;

class SqlFriendsRepository implements FriendsRepository
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addFriend($username, $usernameTeman)
    {
        $sql = "INSERT INTO Friends(username, usernameTeman) VALUES (:username, :usernameTeman)";

        $this->db->query($sql, [
            'username' => $username,
            'usernameTeman' => $usernameTeman
        ]);
    }

    public function removeFriend($username, $usernameTeman)
    {
        $sql = "DELETE FROM Friends WHERE username = :username and usernameTeman = :usernameTeman";

        $this->db->query($sql, [
            'username' => $username,
            'usernameTeman' => $usernameTeman
        ]);
    }

    public function findByUsername($username) : array
    {
        $sql = "SELECT * FROM Friends WHERE username=:username";

        $results = $this->db->fetchAll($sql, \Phalcon\Db\Enum::FETCH_ASSOC, [
            'username' => $username
        ]);

        $resultArray = array();
        foreach($results as $row)
        {
            $friends = new Friends($row['username'], $row['usernameTeman']);

            array_push($resultArray, $friends);
        }

        return $resultArray;
    }
}