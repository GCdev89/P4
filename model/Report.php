<?php
namespace Gaetan\P4\Model;

Class Report
{
    private $_id;
    private $_user_id;
    private $_comment_id;
    private $_reason;
    private $_date;
    private $_comment_user_id;
    private $_title;
    private $_content;
    private $_comment_date;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // Getters
    public function id()
    {
        return $this->_id;
    }

    public function userId()
    {
        return $this->_user_id;
    }

    public function commentId()
    {
        return $this->_comment_id;
    }

    public function reason()
    {
        return $this->_reason;
    }

    public function date()
    {
        return $this->_date;
    }

    public function commentUserId()
    {
        return $this->_comment_user_id;
    }

    public function title()
    {
        return $this->_title;
    }

    public function content()
    {
        return $this->_content;
    }

    public function commentDate()
    {
        return $this->_comment_date;
    }

    // Setters

    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }
    }

    public function setUserId($userId)
    {
        $userId = (int) $userId;
        if ($userId > 0) {
            $this->_user_id = $userId;
        }
    }

    public function setCommentId($commentId)
    {
        $commentId = (int) $commentId;
        if ($commentId > 0) {
            $this->_comment_id = $commentId;
        }
    }

    public function setReason($reason)
    {
        if(is_string($reason))
        {
            if ($reason = 'discrimination' OR $reason = 'hate' OR $reason = 'else') {
                $this->_reason = $reason;
            }
        }
    }

    public function setDate($date)
    {
        if(is_string($date))
        {
            $this->_date = $date;
        }
    }

    public function setCommentUserId($commentUserId)
    {
        $commentUserId = (int) $commentUserId;
        if ($commentUserId > 0) {
            $this->_comment_user_id = $commentUserId;
        }
    }

    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->_title = $title;
        }
    }

    public function setContent($content)
    {
        if(is_string($content))
        {
            $this->_content = $content;
        }
    }

    public function setCommentDate($commentDate)
    {
        if(is_string($commentDate))
        {
            $this->_comment_date = $commentDate;
        }
    }
}
