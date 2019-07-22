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
        $q = $this->_db->prepare('SELECT id, user_id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM post WHERE id = :id');
        $q->execute(array('id' => $postId));
        $data = $q->fetch();

        $post = new Post($data);
        $q->closeCursor();

        return $post;
    }

    public function getListPosts()
    {
        $posts = [];

        $q = $this->_db->query("SELECT id, user_id, type, title, content, DATE_FORMAT(date, '%d/%m/%Y %Hh%imin') AS date FROM post");

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
