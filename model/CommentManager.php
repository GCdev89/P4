<?php
namespace Gaetan\P4\Model;

require_once('model/Manager.php');
require_once('model/Comment.php');

class CommentManager extends Manager
{
    private $_db;

    public function __construct()
    {
        $this->setDb();
    }

    public function add(Comment $comment)
    {
        $q = $this->_db->prepare('INSERT INTO comment(user_id, post_id, title, content, date) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $q->execute(array(
            $comment->userId(),
            $comment->postId(),
            $comment->title(),
            $comment->content()
        ));
        return $affectedLines;
    }

    public function getComment($postId)
    {
        if (is_int($postId)) {
            $q = $this->_db->prepare('SELECT id, user_id, title, author, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr FROM billet WHERE id = ?');
            $data = $q->execute(array($postId));
            $comment = new Comment($data);
            $q->closeCursor();
            return $comment;
        }
    }

    public function getListComments($postId)
    {
        $comments = [];

        $q = $this->_db->prepare("SELECT id, title, author, content, DATE_FORMAT(dateComment, '%d/%m/%Y %Hh%imin') AS dateComment FROM comment_blog WHERE postId = :postId ORDER BY dateComment DESC");
        $q->execute(array('postId' => $postId));
        while($data = $q->fetch())
        {
            $comments[] = new Comment($data);
        }
        $q->closeCursor();
        return $comments;
    }

    public function setDb()
    {
        $db = $this->dbConnect();
        $this->_db = $db;
    }
}
