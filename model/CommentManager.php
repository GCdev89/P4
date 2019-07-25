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
        $q = $this->_db->prepare('INSERT INTO comment(user_id, post_id, title, content, report, date) VALUES(:user_id, :post_id, :title, :content, :report, NOW())');
        $affectedLines = $q->execute(array(
            'user_id' => $comment->userId(),
            'post_id' => $comment->postId(),
            'title' => $comment->title(),
            'content' => $comment->content(),
            'report' => $comment->report()
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

        $q = $this->_db->prepare('SELECT u.pseudo userPseudo, c.id id, c.user_id userId, c.post_id postId, c.title title, c.content content, DATE_FORMAT(c.date, \'%d/%m/%Y %Hh%imin\') AS date
        FROM user u
        INNER JOIN comment c
        ON c.user_id = u.id
        WHERE c.post_id = :post_id
        ORDER BY date DESC');
        $q->execute(array('post_id' => $postId));
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
