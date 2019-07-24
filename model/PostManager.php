<?php
namespace Gaetan\P4\Model;

require_once('model/Manager.php');
require_once('model/Post.php');

class PostManager extends Manager
{
    private $_db;

    public function __construct()
    {
        $this->setDb();
    }

    public function add(Post $post)
    {
        $q = $this->_db->prepare('INSERT INTO post(user_id, type, title, content, date) VALUES(:user_id, :type, :title, :content, NOW())');
        $q->execute(array(
            'user_id' => $post->userId(),
            'type' => $post->type(),
            'title' => $post->title(),
            'content' => $post->content()
        ));
    }

    public function getPost($postId)
    {
        $q = $this->_db->prepare('SELECT u.pseudo userPseudo, p.id id, p.user_id userId, p.title title, p.content content, DATE_FORMAT(p.date, \'%d/%m/%Y à %Hh%imin%ss\') AS date
        FROM user u
        INNER JOIN post p
        ON p.user_id = u.id
        WHERE p.id = :id');
        $q->execute(array('id' => $postId));
        $data = $q->fetch();

        $post = new Post($data);
        $q->closeCursor();

        return $post;
    }

    public function getListPosts()
    {
        $posts = [];

        $q = $this->_db->query('SELECT u.pseudo userPseudo, p.id id, p.user_id userId, p.type type, p.title title, p.content content, DATE_FORMAT(p.date, \'%d/%m/%Y %Hh%imin\') AS date
        FROM user u
        INNER JOIN post p
        ON p.user_id = u.id');

        while($data = $q->fetch())
        {
            $posts[] = new Post($data);
        }
        $q->closeCursor();

        return $posts;
    }

    public function setDb()
    {
        $db = $this->dbConnect();
        $this->_db = $db;
    }
}
