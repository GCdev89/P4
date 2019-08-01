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
        $q = $this->_db->prepare('INSERT INTO comment(user_id, post_id, title, content, date) VALUES(:user_id, :post_id, :title, :content, NOW())');
        $affectedLines = $q->execute(array(
            'user_id' => $comment->userId(),
            'post_id' => $comment->postId(),
            'title' => $comment->title(),
            'content' => $comment->content(),
        ));
        return $affectedLines;
    }

    public function getComment($commentId)
    {
        $q = $this->_db->prepare('SELECT id, user_id userId, post_id postId, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM comment WHERE id = :id');
        $q->execute(array('id' => $commentId));
        $data = $q->fetch();
        $comment = new Comment($data);
        $q->closeCursor();

        return $comment;
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

    public function update(Comment $comment)
    {
        $q = $this->_db->prepare('UPDATE comment SET title = :newtitle, content = :newcontent WHERE id = :id');
        $affectedLines = $q->execute(array(
            'newtitle' => $comment->title(),
            'newcontent' => $comment->content(),
            'id' => $comment->id()
        ));
        return $affectedLines;
    }

    public function delete($commentId)
    {
        $q = $this->_db->prepare('DELETE FROM comment WHERE id = :id');
        $affectedLines = $q->execute(array('id' => $commentId));

        return $affectedLines;
    }

    public function exists($data)
    {
        $q = $this->_db->prepare('SELECT COUNT(*) FROM comment WHERE id = :id');
        $q->execute(array('id' => $data));
        return (bool) $q->fetchColumn();
    }

    public function setDb()
    {
        $db = $this->dbConnect();
        $this->_db = $db;
    }
}
