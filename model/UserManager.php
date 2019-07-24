<?php
namespace Gaetan\P4\Model;

require_once('model/Manager.php');
require('model/User.php');

class UserManager extends Manager
{
    private $_db;

    public function __construct()
    {
        $this->setDb();
    }

    public function add(User $user)
    {
        $q = $this->_db->prepare('INSERT INTO user(role, pseudo, password, mail, date) VALUES(:role, :pseudo, :password, :mail, NOW())');
        $affectedLines= $q->execute(array(
            'role' => $user->role(),
            'pseudo' => $user->pseudo(),
            'mail' => $user->mail(),
            'password' => $user->password()
        ));
        return $affectedLines;
    }

    public function getUser($userId)
    {
        $q = $this->_db->prepare('SELECT id, role, name, forname, mail, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM user WHERE id = :id');
        $q->execute(array('id' => $userId));
        $data = $q->fetch();

        $user = new User($data);
        $q->closeCursor();

        return $user;
    }

    public function getListUsers()
    {
        $users = [];

        $q = $this->_db->query('SELECT id, role, name, forname, mail, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM user');

        while($data = $q->fetch())
        {
            $users[] = new User($data);
        }
        $q->closeCursor();

        return $users;
    }

    public function exists($data)
    {
        $q = $this->_db->prepare('SELECT COUNT(*) FROM user WHERE pseudo = :pseudo');
        $q->execute(array('pseudo' => $data));
        return (bool) $q->fetchColumn();
    }


    public function setDb()
    {
        $db = $this->dbConnect();
        $this->_db = $db;
    }
}
