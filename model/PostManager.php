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
        $q = $this->_db->prepare('INSERT INTO post(type, title, author, content, date_post) VALUES(:type, :title, :author, :content, NOW())');
        $q->execute(array(
            'type' => $post->type(),
            'title' => $post->title(),
            'author' => $post->author(),
            'content' => $post->content()
        ));
    }

    public function getPost($postId)
    {
        $q = $this->_db->prepare('SELECT id, title, author, content, DATE_FORMAT(datePost, \'%d/%m/%Y à %Hh%imin%ss\') AS datePost FROM billet WHERE id = :id');
        $q->execute(array('id' => $postId));
        $data = $q->fetch();

        $post = new Post($data);
        $q->closeCursor();

        return $post;
    }

    public function getListPosts()
    {
        $posts = [];

        $q = $this->_db->query("SELECT id, title, author, content, DATE_FORMAT(datePost, '%d/%m/%Y %Hh%imin') AS datePost FROM billet");

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
