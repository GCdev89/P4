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
        if (is_int($postId)) {
            $q = $this->_db->prepare('SELECT id, title, author, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM billet WHERE id = ?');
            $data = $q->execute(array($postId));

            return new Post($data);
        }
    }

    public function getListPosts()
    {
        $posts = [];

        $q = $this->_db->query("SELECT id, title, author, content, DATE_FORMAT(date_post, '%d/%m/%Y %Hh%imin') AS date_post_fr FROM billet");

        while($data = $q->fetch())
        {
            $posts[] = new Post($data);
        }
        return $posts;
    }

    public function setDb()
    {
        $db = $this->dbConnect();
        $this->_db = $db;
    }
}
